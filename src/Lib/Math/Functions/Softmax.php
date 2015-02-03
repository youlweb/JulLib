<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Functions;

/**
 * Softmax function.
 *
 * Represent the categorical probability distribution of a vector.
 * @author Julien <youlweb@hotmail.com>
 */
class Softmax implements FunctionInterface
{
    /**
     * Return the categorical probability distribution of a vector.
     *
     * @param float[] $x Vector of real values.
     * @return float[] Probability distribution.
     * @throws FunctionException If the input argument is not an array,
     * or is an empty array.
     */
    public function f($x)
    {
        if (!is_array($x) || !count($x)) {
            throw new FunctionException('The softmax function requires an array of real numbers.');
        }
        $sum = 0;
        foreach ($x as &$value) {
            $value = exp($value);
            $sum += $value;
        }
        return array_map(function ($value) use ($sum) {
            return $value / $sum;
        }, $x);
    }
}