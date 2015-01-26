<?php

/*
 * This file is part of the JulLib package.
 *
 * © 2014 Julien <youlweb@hotmail.com>
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

    public function testConstructThrowsExceptionIfNonNumericValues()
    {
        $this->setExpectedException(self::EXCEPTION);
        new Vector([3, 5, 'foo', 2]);
    }

    public function testAdd()
    {
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5, 2.5, 3]);
        $this->assertEquals([0, 5, 7], $vector_1->add($vector_2)->getVector());
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
        $array = [5, 2.5, 4];
        $vector = new Vector($array);
        foreach ($vector as $key => $value) {
            $this->assertEquals($array[$key], $value);
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

    public function testMagnitude()
    {
        $vector = new Vector([7, 5, 4]);
        $this->assertEquals(9.5, round($vector->magnitude(), 1));
    }
}