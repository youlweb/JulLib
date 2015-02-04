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
 * A delimiter tokenizer can be provided to determine how suffixes should be
 * truncated. This allows to obtain suffix words for instance.
 * Suffix arrays are used in full text indices, data compression, semantic
 * analysis, spam filtering, and within the field of bioinformatics.
 * @author Julien <youlweb@hotmail.com>
 */
class SuffixArray implements SuffixArrayInterface
{
    /**
     * @var DelimiterInterface
     */
    private $_delimiter;

    /**
     * @var int
     */
    private $_sort;

    /**
     * @param string $delimiter Optionally use a delimiter to determine how
     * suffixes should be truncated.
     */
    public function __construct(DelimiterInterface $delimiter = null)
    {
        $this->_delimiter = $delimiter;
    }

    /** {@inheritDoc} */
    public function getDelimiter()
    {
        return $this->_delimiter;
    }

    /** {@inheritDoc} */
    public function setSort($sort = SORT_STRING)
    {
        $this->_sort = $sort;
        return $this;
    }

    /**
     * Return a suffix array.
     *
     * @param string $string
     * @return string[]
     */
    public function tokenize($string)
    {
        if (!$string) {
            return [];
        }
        $suffixes = $this->_delimiter ? $this->suffixArrayDelimiter($string) : $this->suffixArray($string);
        if (null !== $this->_sort) {
            sort($suffixes, $this->_sort);
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
        $tokens = $this->_delimiter->tokenize($string);
        $delimiter = $this->_delimiter->getDelimiter();
        $count = count($tokens);
        $suffixes = [$tokens[$count - 1]];
        for ($a = $count - 2; $a > -1; $a--) {
            $suffixes[] = $tokens[$a] . $delimiter . end($suffixes);
        }
        if (null !== $this->_sort) {
            return $suffixes;
        }
        return array_reverse($suffixes);
    }
}