<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Math\Functions;

use Jul\Lib\Math\Functions\Softmax;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class SoftmaxTest extends \PHPUnit_Framework_TestCase
{
    const EXCEPTION = 'Jul\Lib\Math\Functions\FunctionException';

    public function testF()
    {
        $softmax = new Softmax();
        $this->assertEquals([.5, .5], $softmax->f([2, 2]));
        $this->assertEquals(1, array_sum($softmax->f([3, 7.7, 9, -2])));
    }

    public function testFThrowsExceptionIfInputNotArray()
    {
        $this->setExpectedException(self::EXCEPTION);
        $softmax = new Softmax();
        $softmax->f(1);
    }

    public function testFThrowsExceptionIfInputArrayEmpty()
    {
        $this->setExpectedException(self::EXCEPTION);
        $softmax = new Softmax();
        $softmax->f([]);
    }
}