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
 * Vomit the PHP configuration on the standard output.
 * @author Julien <youlweb@hotmail.com>
 */
class PhpInfo
{
    /**
     * Output the PHP configuration.
     * @param int $what {@link http://php.net/manual/en/function.phpinfo.php Constant} used to customize the output.
     * @return bool TRUE on success, FALSE otherwise.
     */
    public static function vomit($what = INFO_ALL)
    {
        return phpinfo($what);
    }
}