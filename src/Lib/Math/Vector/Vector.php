<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Math\Vector;

/**
 * A quantity having direction as well as magnitude.
 *
 * This implementation consists of an array of floats.
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
     * @throws VectorException If the input array is empty or contains non-numeric values.
     */
    public function __construct(array $vector)
    {
        if (!count($vector)) {
            throw new VectorException('The input array is empty');
        }
        foreach ($vector as $value) {
            if (!is_numeric($value)) {
                throw new VectorException('The input array contains non-numeric values.');
            }
        }
        $this->_vector = array_values($vector);
    }

    /** {@inheritDoc} */
    public function add(VectorInterface $vector)
    {
        $this->checkInputVectorLength($vector);
        foreach ($vector as $key => $value) {
            $this->_vector[$key] += $value;
        }
        return $this;
    }

    /** {@inheritDoc} */
    public function count()
    {
        return count($this->_vector);
    }

    /** {@inheritDoc} */
    public function current()
    {
        return $this->_vector[$this->_current];
    }

    /** {@inheritDoc} */
    public function dotProduct(VectorInterface $vector)
    {
        $length = $this->checkInputVectorLength($vector);
        $products = array_fill(0, $length, 0);
        foreach ($vector as $key => $value) {
            $products[$key] = $value * $this->_vector[$key];
        }
        return array_sum($products);
    }

    /** {@inheritDoc} */
    public function get()
    {
        return $this->_vector;
    }

    /** {@inheritDoc} */
    public function key()
    {
        return $this->_current;
    }

    /** {@inheritDoc} */
    public function invert()
    {
        foreach ($this as $key => $value) {
            $this->_vector[$key] = -$value;
        }
        return $this;
    }

    /** {@inheritDoc} */
    public function magnitude()
    {
        $sum = 0;
        foreach ($this as $value) {
            $sum += pow($value, 2);
        }
        return sqrt($sum);
    }

    /** {@inheritDoc} */
    public function mean()
    {
        return $this->sum() / $this->count();
    }

    /** {@inheritDoc} */
    public function next()
    {
        ++$this->_current;
    }

    /** {@inheritDoc} */
    public function rewind()
    {
        $this->_current = 0;
    }

    /** {@inheritDoc} */
    public function scale($factor)
    {
        foreach ($this as $key => $value) {
            $this->_vector[$key] = $value * $factor;
        }
        return $this;
    }

    /** {@inheritDoc} */
    public function subtract(VectorInterface $vector)
    {
        $this->checkInputVectorLength($vector);
        foreach ($vector as $key => $value) {
            $this->_vector[$key] += -$value;
        }
        return $this;
    }

    /** {@inheritDoc} */
    public function sum()
    {
        return array_sum($this->_vector);
    }

    /** {@inheritDoc} */
    public function valid()
    {
        return array_key_exists($this->_current, $this->_vector);
    }

    /**
     * Enforce that the input vector is the same length as this vector.
     *
     * @param VectorInterface $vector
     * @return int Vector length.
     * @throws VectorException If the input vector is of different length.
     */
    private function checkInputVectorLength(VectorInterface $vector)
    {
        $length = $this->count();
        if ($vector->count() !== $length) {
            throw new VectorException('This operation must be performed on vectors of identical length.');
        }
        return $length;
    }
}