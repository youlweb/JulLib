<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * Create an array of tokens from a string.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface TokenizerInterface
{
    /**
     * Split the input string into an array of tokens.
     *
     * @param $string
     * @return mixed
     */
    public function tokenize($string);
}