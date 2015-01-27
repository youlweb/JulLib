<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Collection;

use Closure, Countable, Iterator;

/**
 * An iterable set of objects.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface CollectionInterface extends Countable, Iterator
{
    /**
     * Append an object to the collection.
     *
     * @param mixed $object
     * @return self
     */
    public function add($object);

    /**
     * Reset the collection.
     *
     * @return self
     */
    public function clear();

    /**
     * Return the object corresponding to the input offset.
     *
     * @param int $offset
     * @return mixed Object.
     * @throws CollectionException On invalid offset.
     */
    public function get($offset);

    /**
     * Check the collection for an object.
     *
     * @param mixed $object
     * @return boolean
     */
    public function has($object);

    /**
     * Check if any object in the collection responds to a predicate.
     *
     * @param callable $function
     * @return boolean
     */
    public function hasPredicate(Closure $function);

    /**
     * Check if the collection contains anything.
     *
     * @return boolean
     */
    public function isEmpty();

    /**
     * Return the last object of the collection.
     *
     * @return mixed|boolean Object or FALSE if the collection is empty.
     */
    public function last();

    /**
     * Select a subset of objects using a closure.
     *
     * @param callable $function
     * @return CollectionInterface Collection containing the filtered objects.
     */
    public function filter(Closure $function);

    /**
     * Delete an object from the collection.
     *
     * @param mixed $object
     * @return self
     * @throws CollectionException If the object is not found.
     */
    public function remove($object);

    /**
     * Organize the collection according to a predicate.
     *
     * The closure works like {@link http://php.net/manual/en/function.usort.php usort}.
     * @param callable $function
     * @return self
     */
    public function sort(Closure $function);
}