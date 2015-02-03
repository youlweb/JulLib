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
 * Used in full text indices, data compression, semantic analysis, spam filtering,
 * and within the field of bioinformatics.
 * A minimum length can be provided to filter out repetitions of short substrings.
 * A delimiter such as a whitespace can be provided to find repeated tokens.
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

    /**
     * Return unique repeated substrings.
     *
     * @param string $string
     * @return string[]
     */
    public function tokenize($string)
    {
        $suffixArray = new SuffixArray(true, $this->_delimiter);
        $suffixes = $suffixArray->tokenize($string);
        if (count($suffixes) < 2) {
            return [];
        }
        return array_values(array_unique($this->_delimiter ?
            $this->repeatedSubstringsDelimiter($suffixes) : $this->repeatedSubstrings($suffixes)));
    }

    /**
     * @param string[] $suffixes
     * @return string[] Repeated substrings.
     */
    private function repeatedSubstrings(array $suffixes)
    {
        $result = [];
        for ($a = 1; $a < count($suffixes); $a++) {
            $prev_line = &$suffixes[$a - 1];
            for ($b = 0; $b < strlen($prev_line); $b++) {
                if ($suffixes[$a][$b] != $prev_line[$b]) {
                    break;
                }
                if ($b >= $this->_min) {
                    $result[] = substr($prev_line, 0, $b + 1);
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
        $delimiter_length = strlen($this->_delimiter) - 1;
        for ($a = 1; $a < count($suffixes); $a++) {
            $find_delimiter = true;
            $prev_line = &$suffixes[$a - 1];
            $last = strlen($prev_line) - 1;
            for ($b = 0; $b <= $last; $b++) {
                if ($suffixes[$a][$b] != $prev_line[$b]) {
                    break;
                }
                if ($b == $last) {
                    if ($b >= $this->_min) {
                        $result[] = substr($prev_line, 0);
                    }
                    break;
                }
                if ($find_delimiter) {
                    $next_delimiter = strpos($prev_line, $this->_delimiter, $b);
                    $find_delimiter = false;
                }
                if ($b === $next_delimiter) {
                    if ($b > $this->_min) {
                        $result[] = substr($prev_line, 0, $b);
                    }
                    $b += $delimiter_length;
                    $find_delimiter = true;
                }
            }
        }
        return $result;
    }
}