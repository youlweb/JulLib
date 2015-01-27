<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Collection\Buffer;

use Jul\Lib\Collection\AbstractCollection;

/**
 * A fixed size, iterable F.I.F.O object buffer.
 *
 * The buffer implements a collection.
 * @see Jul\Lib\Collection\CollecionInterface
 * @author Julien <youlweb@hotmail.com>
 */
class AbstractBuffer extends AbstractCollection
{
    /**
     * @var int
     */
    protected $_size;

    /**
     * Initialize the buffer with a maximum size.
     *
     * @param int $size
     * @throws BufferException If the buffer size is too small.
     */
    public function __construct($size)
    {
        if ($size <= 0) {
            throw new BufferException('The minimum buffer size is 1');
        }
        $this->_size = $size;
    }

    /** {@inheritDoc} */
    public function add($object)
    {
        if ($this->isWarm()) {
            $this->remove($this->first());
        }
        parent::add($object);
    }

    /** {@inheritDoc} */
    public function first()
    {
        if ($this->isEmpty()) {
            throw new BufferException('Cannot get the first element of an empty buffer.');
        }
        return $this->get(0);
    }

    /** {@inheritDoc} */
    public function isWarm()
    {
        return $this->count() == $this->size();
    }

    /** {@inheritDoc} */
    public function size()
    {
        return $this->_size;
    }
}