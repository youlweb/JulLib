<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Entity;

/**
 * An entity is a persistent object.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface EntityInterface
{
    /**
     * Return the unique entity identifier.
     *
     * @return string
     */
    public function getId();
}