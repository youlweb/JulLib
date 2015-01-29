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
     * Provide a closure used to compute the property value.
     *
     * @param callable $function
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
     * @return bool|float|int
     */
    public function value($string)
    {
        $arguments = func_get_args();
        return call_user_func_array($this->_function, $arguments);
    }
}