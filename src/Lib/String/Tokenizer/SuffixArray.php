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
     * @var bool
     */
    private $_sorted;

    /**
     * @param bool $sorted Optionally sort the array in alphabetical order.
     */
    public function __construct($sorted = false)
    {
        $this->_sorted = $sorted;
    }

    /** {@inheritDoc} */
    public function tokenize($string)
    {
        $suffixes = [];
        if (!$string) {
            return $suffixes;
        }
        foreach (str_split($string) as $index => $char) {
            $suffixes[] = substr($string, $index);
        }
        if ($this->_sorted) {
            sort($suffixes, SORT_STRING);
        }
        return $suffixes;
    }
}