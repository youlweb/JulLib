<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Property;

/**
 * Quantify a particular aspect of a string.
 *
 * Intended to create vector representations, such as word vectors.
 * @author Julien <youlweb@hotmail.com>
 */
interface PropertyInterface
{
    /**
     * Return the property quantity for the input string.
     *
     * @param string $string
     * @return bool|float|int
     */
    public function value($string);
}