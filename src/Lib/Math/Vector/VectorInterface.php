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
 * @author Julien <youlweb@hotmail.com>
 */
interface VectorInterface extends \Countable, \Iterator
{
    /**
     * Add a vector's values to the current vector.
     *
     * @param VectorInterface $vector
     * @return self
     * @throws VectorException If the input vector is of different length.
     */
    public function add(VectorInterface $vector);

    /**
     * Return the dot product of a vector and the current vector.
     *
     * @param VectorInterface $vector
     * @return float
     * @throws VectorException If the input vector is of different length.
     */
    public function dotProduct(VectorInterface $vector);

    /**
     * Return the vector as an array of float(s).
     *
     * @return float[]
     */
    public function getVector();

    /**
     * Return the magnitude of the vector.
     *
     * @return float
     */
    public function magnitude();

    /**
     * Subtract a vector from the current vector.
     *
     * @param VectorInterface $vector
     * @return self
     */
    public function subtract(VectorInterface $vector);

    /**
     * Return the sum of the vector's values.
     *
     * @return float
     */
    public function sum();
}