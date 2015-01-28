<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Functions;

/**
 * An object container for any mathematical function.
 *
 * The goal of these containers is to chain mathematical operations dynamically.
 * @author Julien <youlweb@hotmail.com>
 */
interface FunctionInterface
{
    /**
     * Calculate f(x).
     *
     * @param float|float[] $x Single value or array.
     * @return float|float[] Single value or array.
     */
    public function f($x);
}