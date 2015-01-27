<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Collection;

use Closure;

/**
 * An iterable set of object.
 *
 * @author Julien <youlweb@hotmail.com>
 */
abstract class AbstractCollection implements CollectionInterface
{
    /**
     * @var int
     */
    protected $_current = 0;

    /**
     * @var array
     */
    protected $_objects;

    /**
     * The collection may be initialized with an array of objects.
     *
     * @param array $objects
     */
    public function __construct(array $objects = [])
    {
        $this->_objects = $objects;
    }

    /** {@inheritDoc} */
    public function add($object)
    {
        $this->_objects[] = $object;
        return $this;
    }

    /** {@inheritDoc} */
    public function clear()
    {
        $this->_objects = [];
        return $this;
    }

    /** {@inheritDoc} */
    public function count()
    {
        return count($this->_objects);
    }

    /** {@inheritDoc} */
    public function current()
    {
        return $this->_objects[$this->_current];
    }

    /** {@inheritDoc} */
    public function filter(Closure $function)
    {
        return new static(array_values(array_filter($this->_objects, $function)));
    }

    /** {@inheritDoc} */
    public function get($offset)
    {
        if (!array_key_exists($offset, $this->_objects)) {
            throw new CollectionException('The offset ' . $offset . ' is invalid.');
        }
        return $this->_objects[$offset];
    }

    /** {@inheritDoc} */
    public function has($object)
    {
        return in_array($object, $this->_objects, true);
    }

    /** {@inheritDoc} */
    public function hasPredicate(Closure $function)
    {
        foreach ($this as $object) {
            if (true === $function($object)) {
                return true;
            }
        }
        return false;
    }

    /** {@inheritDoc} */
    public function isEmpty()
    {
        return $this->count() === 0;
    }

    /** {@inheritDoc} */
    public function key()
    {
        return $this->_current;
    }

    /** {@inheritDoc} */
    public function last()
    {
        return end($this->_objects);
    }

    /** {@inheritDoc} */
    public function next()
    {
        ++$this->_current;
    }

    /** {@inheritDoc} */
    public function remove($object)
    {
        $offset = array_search($object, $this->_objects, true);
        if (false === $offset) {
            throw new CollectionException('Input object not found.');
        }
        array_splice($this->_objects, $offset, 1);
        return $this;
    }

    /** {@inheritDoc} */
    public function rewind()
    {
        $this->_current = 0;
    }

    /** {@inheritDoc} */
    public function sort(Closure $function)
    {
        usort($this->_objects, $function);
    }

    /** {@inheritDoc} */
    public function valid()
    {
        return array_key_exists($this->_current, $this->_objects);
    }
}