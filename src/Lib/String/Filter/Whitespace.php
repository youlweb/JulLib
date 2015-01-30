<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Filter;

/**
 * Trim consecutive whitespaces down to a single whitespace.
 *
 * New lines and tabs are also converted to a single whitespace.
 * Optionally, leading and trailing whitespaces may be stripped.
 * @author Julien <youlweb@hotmail.com>
 */
class Whitespace implements FilterInterface
{
    /**
     * @var bool
     */
    private $_trim;

    /**
     * @param bool $trim Trim leading and trailing whitespaces.
     */
    public function __construct($trim = false)
    {
        $this->_trim = $trim;
    }

    /** {@inheritDoc} */
    public function filter($string)
    {
        $filtered = preg_replace("/[\\x00-\\x20]+/", ' ', $string);
        if ($this->_trim) {
            return trim($filtered);
        }
        return $filtered;
    }
}