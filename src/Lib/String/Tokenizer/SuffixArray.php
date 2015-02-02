<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * An array of all suffixes of a string.
 *
 * Often considered an efficient alternative to suffix trees.
 * The output may be sorted alphabetically, for such application as finding
 * repeated substrings in a string.
 * A delimiter string can be provided to determine how suffixes should be
 * truncated. This allows to obtain suffix words for instance.
 * Suffix arrays are used in full text indices, data compression, semantic
 * analysis, spam filtering, and within the field of bioinformatics.
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
    private $_sort;

    /**
     * @param bool $sort Optionally sort the output array in alphabetical order.
     * @param string $delimiter Optionally use a delimiter to determine how
     * suffixes should be truncated.
     */
    public function __construct($sort = false, $delimiter = null)
    {
        $this->_sort = $sort;
        $this->_delimiter = $delimiter;
    }

    /** {@inheritDoc} */
    public function tokenize($string)
    {
        if (!$string) {
            return [];
        }
        $suffixes = $this->_delimiter ? $this->suffixArrayDelimiter($string) : $this->suffixArray($string);
        if ($this->_sort) {
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
        $delimiter = new Delimiter($this->_delimiter);
        $tokens = $delimiter->tokenize($string);
        $string = implode($this->_delimiter, $tokens);
        $delimiter_size = strlen($this->_delimiter);
        $suffixes = [$string];
        while (($index = strpos($string, $this->_delimiter)) !== false) {
            $string = substr($string, $index + $delimiter_size);
            $suffixes[] = $string;
        }
        return $suffixes;
    }
}