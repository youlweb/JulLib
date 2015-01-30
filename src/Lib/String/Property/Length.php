<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Property;

/**
 * The number of chars in a string.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class Length implements PropertyInterface
{
    /**
     * Return the length of the input string.
     *
     * @param string $string
     * @return int
     */
    public function value($string)
    {
        return strlen($string);
    }
}