<?php

/*
 * This file is part of the JulLib package.
 *
 * © 2014 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib;

/**
 * PHP Info
 * Display the PHP configuration on the standard output.
 * @author Julien <youlweb@hotmail.com>
 */
class PhpInfo
{
    /**
     * Display the PHP configuration.
     * @return bool
     */
    public function output()
    {
        return phpinfo();
    }
}