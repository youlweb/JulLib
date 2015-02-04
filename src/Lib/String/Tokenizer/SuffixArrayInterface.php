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
 * @author Julien <youlweb@hotmail.com>
 */
interface SuffixArrayInterface extends TokenizerInterface
{
    /**
     * Return the delimiter used to truncate the suffixes.
     *
     * A suffix array can be created without a delimiter, thus this function
     * may return null.
     * @return DelimiterInterface|null
     */
    public function getDelimiter();

    /**
     * Instruct the tokenizer to sort the suffix array in a specific way.
     *
     * Valid sorting flags can be found in the {@link http://php.net/manual/en/function.sort.php PHP sort function manual}.
     * @param int $sort
     * @return self
     */
    public function setSort($sort = SORT_STRING);
}