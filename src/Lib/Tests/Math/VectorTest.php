<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Math;

use Jul\Lib\Math\Vector\Vector;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class VectorTest extends \PHPUnit_Framework_TestCase
{
    const EXCEPTION = 'Jul\Lib\Math\Vector\VectorException';

    public function testConstructFlattensInputArray()
    {
        $vector = new Vector([5 => 2, 'test' => 8, 2 => 3.1]);
        $this->assertTrue([0 => 2, 1 => 8, 2 => 3.1] === $vector->get());
    }

    public function testConstructThrowsExceptionIfEmptyInputArray()
    {
        $this->setExpectedException(self::EXCEPTION);
        new Vector([]);
    }

    public function testConstructThrowsExceptionIfNonNumericValues()
    {
        $this->setExpectedException(self::EXCEPTION);
        new Vector([3, 5, 'foo', 2]);
    }

    public function testAdd()
    {
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5, 2.5, 3]);
        $this->assertEquals([0, 5, 7], $vector_1->add($vector_2)->get());
    }

    public function testAddThrowsExceptionIfVectorsOfDifferentLength()
    {
        $this->setExpectedException(self::EXCEPTION);
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5]);
        $vector_1->add($vector_2);
    }

    public function testCount()
    {
        $array = [5, 2.5, 4];
        $vector = new Vector($array);
        $this->assertEquals(count($array), $vector->count());
    }

    public function testCurrentKeyNextRewindValid()
    {
        $vectors = [5, 2.5, 4];
        $vector = new Vector($vectors);
        foreach ($vector as $key => $value) {
            $this->assertEquals($vectors[$key], $value);
        }
        $vector->rewind();
        $this->assertEquals(0, $vector->key());
    }

    public function testDotProduct()
    {
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([8, 2, 6]);
        $this->assertEquals(69, $vector_1->dotProduct($vector_2));
    }

    public function testDotProductThrowsExceptionIfVectorsOfDifferentLength()
    {
        $this->setExpectedException(self::EXCEPTION);
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5]);
        $vector_1->dotProduct($vector_2);
    }

    public function testInvert()
    {
        $vector = new Vector([3, -5, -0.95]);
        $this->assertEquals([-3, 5, 0.95], $vector->invert()->get());
    }

    public function testMagnitude()
    {
        $vector = new Vector([7, 5, 4]);
        $this->assertEquals(9.5, round($vector->magnitude(), 1));
    }

    public function testMean()
    {
        $vector = new Vector([9, 3, 19]);
        $this->assertEquals(10.3, round($vector->mean(), 1));
    }

    public function testScale()
    {
        $vector = new Vector([5, 1, -10]);
        $this->assertEquals([10, 2, -20], $vector->scale(2)->get());
    }

    public function testSubtract()
    {
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5, 2.5, 3]);
        $this->assertEquals([10, 0, 1], $vector_1->subtract($vector_2)->get());
    }

    public function testSubtractThrowsExceptionIfVectorsOfDifferentLength()
    {
        $this->setExpectedException(self::EXCEPTION);
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5]);
        $vector_1->subtract($vector_2);
    }

    public function testSum()
    {
        $vector = new Vector([3, 7, 5.5]);
        $this->assertEquals(15.5, $vector->sum());
    }
}