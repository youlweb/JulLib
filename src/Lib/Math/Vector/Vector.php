<?php

/*
 * This file is part of the JulLib package.
 *
 * © 2014 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Vector;

/**
 * A quantity having direction as well as magnitude.
 *
 * This implementation consists of an array of floats, on which vector operations can be applied.
 * @author Julien <youlweb@hotmail.com>
 */
class Vector implements VectorInterface
{
    /**
     * @var int
     */
    private $_current = 0;

    /**
     * @var float[]
     */
    private $_vector = [];

    /**
     * Initialize the vector with an array of floats.
     *
     * @param float[] $vector
     */
    public function __construct(array $vector)
    {
        $this->_vector = $vector;
    }

    /**
     * {@inheritDoc}
     */
    public function add(VectorInterface $vector)
    {
        if ($vector->count() !== $this->count()) {
            throw new VectorException('Vectors of different length cannot be added together.');
        }
        foreach ($vector as $key => $value) {
            $this->_vector[$key] += $value;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->_vector);
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return $this->_vector[$this->_current];
    }

    /**
     * {@inheritDoc}
     */
    public function getMagnitude()
    {

    }

    /**
     * {@inheritDoc}
     */
    public function getVector()
    {
        return $this->_vector;
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return $this->_current;
    }

    /**
     * {@inheritDoc}
     */
    public function multiply(VectorInterface $vector)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        ++$this->_current;
    }

    /**
     * {@inheritDoc}
     */
    public function rewind()
    {
        $this->_current = 0;
    }

    /**
     * {@inheritDoc}
     */
    public function subtract(VectorInterface $vector)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function sum()
    {

    }

    /**
     * {@inheritDoc}
     */
    public function valid()
    {
        return array_key_exists($this->_current, $this->_vector);
    }
}