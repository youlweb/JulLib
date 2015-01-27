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
 * A fixed size F.I.F.O object buffer.
 *
 * This implementation is based on the collection class.
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
     */
    public function __construct($size)
    {
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