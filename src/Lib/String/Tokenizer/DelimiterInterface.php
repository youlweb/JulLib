<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * Break a string down into an array of terms using a delimiter.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface DelimiterInterface extends TokenizerInterface
{
    /**
     * Return the delimiter string.
     *
     * @return string
     */
    public function getDelimiter();
}