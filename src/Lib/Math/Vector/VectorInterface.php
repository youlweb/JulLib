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
interface VectorInterface extends \Countable, \Iterator
{
    /**
     * Add a vector's values to the current vector.
     *
     * @param VectorInterface $vector
     * @return self
     */
    public function add(VectorInterface $vector);

    /**
     * Return the magnitude of the vector.
     *
     * @return float
     */
    public function getMagnitude();

    /**
     * Return the vector as an array of float(s).
     *
     * @return float[]
     */
    public function getVector();

    /**
     * Multiply the vector by another vector.
     *
     * @param VectorInterface $vector
     * @return self
     */
    public function multiply(VectorInterface $vector);

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