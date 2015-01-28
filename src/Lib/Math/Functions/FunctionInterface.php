<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Functions;

/**
 * An object-oriented container for mathematical functions.
 *
 * The goal of this architecture is to stack functions in composite objects.
 * @author Julien <youlweb@hotmail.com>
 */
interface FunctionInterface
{
    /**
     * Calculate f(x).
     *
     * @param int|float $x
     * @return int|float|float[] Result.
     */
    public function f($x);
}