<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Collection\Buffer;

use stdClass;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class AbstractBufferTest extends \PHPUnit_Framework_TestCase
{
    const ABSTRACT_BUFFER_FQN = 'Jul\Lib\Collection\Buffer\AbstractBuffer';
    const BUFFER_EXCEPTION = 'Jul\Lib\Collection\Buffer\BufferException';

    public function testConstruct()
    {
        $buffer = $this->getMockBuffer(5);
        $this->assertEquals(5, $buffer->size());
    }

    public function testConstructThrowsExceptionIfSizeTooSmall()
    {
        $this->setExpectedException(self::BUFFER_EXCEPTION);
        $this->getMockBuffer(0);
    }

    public function testAdd()
    {
        $object_1 = $this->getStdObject();
        $object_2 = $this->getStdObject();
        $buffer = $this->getMockBuffer(1);
        $buffer->add($object_1);
        $buffer->add($object_2);
        $this->assertEquals(1, $buffer->count());
    }

    public function testFirst()
    {
        $object_1 = $this->getStdObject();
        $object_2 = $this->getStdObject();
        $buffer = $this->getMockBuffer(2);
        $buffer->add($object_1);
        $buffer->add($object_2);
        $this->assertEquals($object_1, $buffer->first());
    }

    public function testFirstThrowsExceptionIfBufferIsEmpty()
    {
        $this->setExpectedException(self::BUFFER_EXCEPTION);
        $buffer = $this->getMockBuffer(1);
        $buffer->first();
    }

    public function testIsWarm()
    {
        $object_1 = $this->getStdObject();
        $object_2 = $this->getStdObject();
        $buffer = $this->getMockBuffer(2);
        $buffer->add($object_1);
        $this->assertFalse($buffer->isWarm());
        $buffer->add($object_2);
        $this->assertTrue($buffer->isWarm());
    }

    public function testSize()
    {
        $buffer = $this->getMockBuffer(10);
        $this->assertEquals(10, $buffer->size());
    }

    /**
     * @param int $size
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getMockBuffer($size)
    {
        return $this->getMockForAbstractClass(self::ABSTRACT_BUFFER_FQN, [$size]);
    }

    /**
     * @return stdClass
     */
    private function getStdObject()
    {
        return new stdClass();
    }
}
