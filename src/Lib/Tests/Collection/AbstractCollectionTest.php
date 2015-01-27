<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Collection;

use stdClass;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class AbstractCollectionTest extends \PHPUnit_Framework_TestCase
{
    const ABSTRACT_COLLECTION_CLASS = 'Jul\Lib\Collection\AbstractCollection';
    const EXCEPTION = 'Jul\Lib\Collection\CollectionException';

    public function testAdd()
    {
        $collection = $this->getNewCollection();
        $object = $this->getStdObject();
        $this->assertEquals($object, $collection->add($object)->get(0));
    }

    public function testClear()
    {
        $collection = $this->getNewCollection([$this->getStdObject()]);
        $this->assertEquals(0, $collection->clear()->count());
    }

    public function testCount()
    {
        $object = $this->getStdObject();
        $collection = $this->getNewCollection([$object, $object, $object]);
        $this->assertEquals(3, $collection->count());
    }

    public function testCurrentKeyNextRewindValid()
    {
        $objects = [$this->getStdObject(), $this->getStdObject()];
        $collection = $this->getNewCollection($objects);
        foreach ($collection as $offset => $object) {
            $this->assertEquals($objects[$offset], $object);
        }
        $collection->rewind();
        $this->assertEquals(0, $collection->key());
    }

    public function testFilter()
    {
        $object_1 = $this->getStdObject();
        $object_1->aProperty = 7;
        $object_2 = $this->getStdObject();
        $object_2->aProperty = 9;
        $collection_1 = $this->getNewCollection([$object_1, $object_2]);
        $collection_2 = $collection_1->filter(function ($object) {
            return $object->aProperty > 7;
        });
        $this->assertEquals($object_2, $collection_2->get(0));
        $this->assertEquals(1, $collection_2->count());
    }

    public function testGet()
    {
        $object = $this->getStdObject();
        $collection = $this->getNewCollection([$object]);
        $this->assertEquals($object, $collection->get(0));
    }

    public function testGetThrowsExceptionIfInvalidOffset()
    {
        $this->setExpectedException(self::EXCEPTION);
        $object = $this->getStdObject();
        $collection = $this->getNewCollection([$object]);
        $this->assertEquals($object, $collection->get(1));
    }

    public function testHas()
    {
        $object_1 = $this->getStdObject();
        $object_2 = $this->getStdObject();
        $collection = $this->getNewCollection([$object_1]);
        $this->assertTrue($collection->has($object_1));
        $this->assertFalse($collection->has($object_2));
    }

    public function testHasPredicate()
    {
        $object = $this->getStdObject();
        $object->aProperty = 7;
        $collection = $this->getNewCollection([$object]);
        $this->assertTrue($collection->hasPredicate(function ($object) {
            return $object->aProperty == 7;
        }));
        $this->assertFalse($collection->hasPredicate(function ($object) {
            return $object->aProperty == 'foo';
        }));
    }

    public function testIsEmpty()
    {
        $collection = $this->getNewCollection();
        $this->assertTrue($collection->isEmpty());
        $this->assertFalse($collection->add($this->getStdObject())->isEmpty());
    }

    public function testRemove()
    {
        $object = $this->getStdObject();
        $collection = $this->getNewCollection([$object]);
        $this->assertEquals(0, $collection->remove($object)->count());
    }

    public function testRemoveThrowsExceptionIfObjectNotFound()
    {
        $this->setExpectedException(self::EXCEPTION);
        $collection = $this->getNewCollection([$this->getStdObject()]);
        $collection->remove($this->getStdObject());
    }

    public function testSort()
    {
        $object_1 = $this->getStdObject();
        $object_1->aProperty = 9;
        $object_2 = $this->getStdObject();
        $object_2->aProperty = 7;
        $collection = $this->getNewCollection([$object_1, $object_2]);
        $this->assertEquals($object_1, $collection->get(0));
        $collection->sort(function ($object_1, $object_2) {
            return $object_1->aProperty > $object_2->aProperty ? 1 : -1;
        });
        $this->assertEquals($object_2, $collection->get(0));
    }

    /**
     * @param array $objects
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getNewCollection(array $objects = [])
    {
        return $this->getMockForAbstractClass(self::ABSTRACT_COLLECTION_CLASS, [$objects]);
    }

    /**
     * @return stdClass
     */
    private function getStdObject()
    {
        return new stdClass();
    }
}
