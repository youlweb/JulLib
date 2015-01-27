<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Entity\Handler;

use Jul\Lib\Entity\EntityInterface;

/**
 * Responsible for persistence operations on an entity.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface HandlerInterface
{
    /**
     * List entities according to criteria.
     *
     * @param array $criteria
     * @return mixed
     */
    public function index(array $criteria);

    /**
     * Erase an entity.
     *
     * @param EntityInterface $entity
     * @return bool TRUE on success, FALSE otherwise.
     */
    public function delete(EntityInterface $entity);

    /**
     * Get an entity.
     *
     * @param string $id
     * @return EntityInterface
     */
    public function load($id);

    /**
     * Persist an entity.
     *
     * @param EntityInterface $entity
     * @return bool TRUE on success, FALSE otherwise.
     */
    public function save(EntityInterface $entity);
}