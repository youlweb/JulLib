<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Math\Functions;

use Jul\Lib\Math\Functions\ClosureFunction;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class ClosureFunctionTest extends \PHPUnit_Framework_TestCase
{
    public function testF()
    {
        $square = new ClosureFunction(function ($x) {
            return $x * $x;
        });
        $this->assertEquals(9, $square->f(3));
    }

    public function testFWithMultipleArguments()
    {
        $squareRoot = new ClosureFunction(function ($x, $precision = 5) {
            return round(sqrt($x), $precision);
        });
        $this->assertEquals(2.2, $squareRoot->f(5, 1));
    }
}
