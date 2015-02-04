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
 * A suffix array tokenizer must be provided at instantiation. If a delimiter was
 * used in the suffix array, it will be applied here too.
 * A minimum length can be provided to filter out repetitions of short substrings.
 * @author Julien <youlweb@hotmail.com>
 */
class RepeatedSubstring implements TokenizerInterface
{
    /**
     * @var int
     */
    private $_min;

    /**
     * @var SuffixArrayInterface
     */
    private $_suffixArray;

    /**
     * @param SuffixArrayInterface $suffixArray Suffix array tokenizer.
     * @param int $min_length Minimum length of the repeated substring.
     */
    public function __construct(SuffixArrayInterface $suffixArray, $min_length = 1)
    {
        $this->_min = $min_length - 1; // Minus 1 because string indexes start at 0.
        $this->_suffixArray = $suffixArray;
    }

    /**
     * Return unique repeated substrings.
     *
     * @param string $string
     * @return string[]
     */
    public function tokenize($string)
    {
        $suffixes = $this->_suffixArray->setSort(SORT_STRING)->tokenize($string);
        if (count($suffixes) < 2) {
            return [];
        }
        return array_values(array_unique(
            ($delimiter = $this->_suffixArray->getDelimiterTokenizer()) ?
                $this->repeatedSubstringsDelimiter($suffixes, $delimiter->getDelimiter()) : $this->repeatedSubstrings($suffixes)
        ));
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
     * @param string $delimiter
     * @return string[] Repeated substrings.
     */
    private function repeatedSubstringsDelimiter(array $suffixes, $delimiter)
    {
        $result = [];
        $delimiter_length = strlen($delimiter) - 1;
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
                    $next_delimiter = strpos($prev_line, $delimiter, $b);
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