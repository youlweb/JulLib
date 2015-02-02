<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * Break a string down into an array of terms.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface TokenizerInterface
{
    /**
     * Split the input string into an array of tokens.
     *
     * @param string $string
     * @return string[]
     */
    public function tokenize($string);
}