<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Property;

use Closure;

/**
 * The value is calculated with a closure provided at instantiation.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class ClosureProperty implements PropertyInterface
{
    /**
     * @var callable
     */
    private $_function;

    /**
     * @param callable $function The closure can receive more than one argument,
     * but only the first one is mandatory. Provide default values to all others,
     * or throw exceptions.
     */
    public function __construct(Closure $function)
    {
        $this->_function = $function;
    }

    /**
     * Return the property quantity for the input string.
     *
     * Optional arguments will be passed to the user-defined closure.
     * @param string $string
     * @param mixed $args,...
     * @return mixed
     */
    public function value($string)
    {
        return call_user_func_array($this->_function, func_get_args());
    }
}