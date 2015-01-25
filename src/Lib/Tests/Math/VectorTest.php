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
    public function testAdd()
    {
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5, 2.5, 3]);
        $this->assertEquals([0, 5, 7], $vector_1->add($vector_2)->getVector());
    }

    public function testAddThrowsExceptionWhenVectorsOfDifferentSize()
    {
        $this->setExpectedException('Jul\Lib\Math\Vector\VectorException');
        $vector_1 = new Vector([5, 2.5, 4]);
        $vector_2 = new Vector([-5]);
        $vector_1->add($vector_2);
    }
}