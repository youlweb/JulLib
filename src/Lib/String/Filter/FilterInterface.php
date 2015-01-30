<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Filter;

/**
 * A filter transforms a string.
 *
 * The goal of this architecture is to stack filters in composite objects.
 * @author Julien <youlweb@hotmail.com>
 */
interface FilterInterface
{
    /**
     * Return the result string after transformation.
     *
     * @param string $string
     * @return string The resulting string.
     */
    public function filter($string);
}