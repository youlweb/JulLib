<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * A sorted array of all suffixes of a string.
 *
 * Used in full text indices, data compression, and within the field of bioinformatics.
 * @author Julien <youlweb@hotmail.com>
 */
class SuffixArray implements TokenizerInterface
{
    /**
     * @var null
     */
    private $_delimiter;

    /**
     * @var bool
     */
    private $_sorted;

    /**
     * @param bool $sorted Optionally sort the array in alphabetical order.
     * @param string $delimiter Optionally use a delimiter to segment
     * the input string.
     */
    public function __construct($sorted = false, $delimiter = null)
    {
        $this->_sorted = $sorted;
        $this->_delimiter = $delimiter;
    }

    /** {@inheritDoc} */
    public function tokenize($string)
    {
        if (!$string) {
            return [];
        }
        $suffixes = $this->_delimiter ? $this->suffixArrayDelimiter($string) : $this->suffixArray($string);
        if ($this->_sorted) {
            sort($suffixes, SORT_STRING);
        }
        return $suffixes;
    }

    /**
     * @param string $string
     * @return string[]
     */
    private function suffixArray($string)
    {
        $suffixes = [];
        for ($a = 0; $a < strlen($string); $a++) {
            $suffixes[] = substr($string, $a);
        }
        return $suffixes;
    }

    /**
     * @param string $string
     * @return string[]
     */
    private function suffixArrayDelimiter($string)
    {
        $suffixes = [$string];
        while (($index = strpos($string, $this->_delimiter)) !== false) {
            $string = substr($string, $index + 1);
            $suffixes[] = $string;
        }
        return $suffixes;
    }
}