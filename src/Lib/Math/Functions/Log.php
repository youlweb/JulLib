<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Functions;

/**
 * Logarithm function.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class Log implements FunctionInterface
{
    /**
     * @var float
     */
    private $_base;

    /**
     * A base can be initialized, otherwise {@link http://php.net/manual/en/function.log.php defaults to 'e'}.
     *
     * @param float $base
     */
    public function __construct($base = M_E)
    {
        $this->_base = $base;
    }

    /**
     * Return the logarithm of x.
     *
     * @param int|float $x
     * @return float
     */
    public function f($x)
    {
        return log($x, $this->_base);
    }
}