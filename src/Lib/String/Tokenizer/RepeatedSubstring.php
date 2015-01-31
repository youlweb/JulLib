<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * Find repeated substrings in a string.
 *
 * A minimum length can be provided to filter repetitions of single characters.
 * A delimiter such as the whitespace char can be provided to find repeated
 * words for instance.
 * This class requires the SuffixArray tokenizer.
 * @author Julien <youlweb@hotmail.com>
 */
class RepeatedSubstring implements TokenizerInterface
{
    /**
     * @var string
     */
    private $_delimiter;

    /**
     * @var int
     */
    private $_min;

    /**
     * @param int $min_length Minimum length of the repeated substring.
     * @param string $delimiter Token separator.
     */
    public function __construct($min_length = 1, $delimiter = null)
    {
        $this->_min = $min_length - 1; // Minus 1 because string indexes start at 0.
        $this->_delimiter = $delimiter;
    }

    /** {@inheritDoc} */
    public function tokenize($string)
    {
        $suffixArray = new SuffixArray(true, $this->_delimiter);
        $suffixes = $suffixArray->tokenize($string);
        if (count($suffixes) < 2) {
            return [];
        }
        if ($this->_delimiter) {
            return $this->repeatedSubstringsDelimiter($suffixes);
        }
        return $this->repeatedSubstrings($suffixes);
    }

    /**
     * @param string[] $suffixes
     * @return string[] Repeated substrings.
     */
    private function repeatedSubstrings(array $suffixes)
    {
        $result = [];
        for ($a = 1; $a < count($suffixes); $a++) {
            for ($b = 0; $b < min(strlen($suffixes[$a]), strlen($suffixes[$a - 1])); $b++) {
                if ($suffixes[$a][$b] != $suffixes[$a - 1][$b]) {
                    break;
                }
                if ($b >= $this->_min && !in_array(($s = substr($suffixes[$a], 0, $b + 1)), $result)) {
                    $result[] = $s;
                }
            }
        }
        return $result;
    }

    /**
     * @param string[] $suffixes
     * @return string[] Repeated substrings.
     */
    private function repeatedSubstringsDelimiter(array $suffixes)
    {
        $result = [];
        $prev_tokens = explode($this->_delimiter, $suffixes[0]);
        for ($a = 1; $a < count($suffixes); $a++) {
            $cur_tokens = explode($this->_delimiter, $suffixes[$a]);
            $substring = '';
            foreach ($cur_tokens as $index => $token) {
                if (!isset($prev_tokens[$index]) || $token !== $prev_tokens[$index]) {
                    break;
                }
                $substring .= $token . $this->_delimiter;
            }
            if (!in_array($substring, $result)) {
                $result[] = $substring;
            }
            $prev_tokens = $cur_tokens;
        }
        return $result;
    }
}