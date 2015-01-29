<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Functions;

use Closure;

/**
 * The function output is calculated with a closure provided at instantiation.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class ClosureFunction implements FunctionInterface
{
    /**
     * @var callable
     */
    private $_function;

    /**
     * Provide a closure used to compute the function output.
     *
     * @param callable $function
     */
    public function __construct(Closure $function)
    {
        $this->_function = $function;
    }

    /**
     * Calculate f(x).
     *
     * Optional arguments will be passed to the user-defined closure.
     * @param float|float[]|mixed $x
     * @param mixed $args,...
     * @return float|float[]|mixed Result.
     */
    public function f($x)
    {
        return call_user_func_array($this->_function, func_get_args());
    }
}