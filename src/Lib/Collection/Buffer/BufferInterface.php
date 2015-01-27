<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Collection\Buffer;

use Jul\Lib\Collection\CollectionInterface;

/**
 * A fixed size, iterable F.I.F.O object buffer.
 *
 * The buffer implements a collection.
 * @see Jul\Lib\Collection\CollecionInterface
 * @author Julien <youlweb@hotmail.com>
 */
interface BufferInterface extends CollectionInterface
{
    /**
     * Return the object in first position.
     *
     * @return mixed First object.
     * @throws BufferException If the buffer is empty.
     */
    public function first();

    /**
     * Check whether the buffer is full.
     *
     * @return boolean
     */
    public function isWarm();

    /**
     * Return the max size of the buffer.
     *
     * @return int
     */
    public function size();

}