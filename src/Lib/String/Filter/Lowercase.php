<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Filter;

/**
 * Convert all alphabetical characters to lowercase.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class Lowercase implements FilterInterface
{
    /** {@inheritDoc} */
    public function filter($string)
    {
        return strtolower($string);
    }
}