<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Sys;

/**
 * PHP info utility.
 *
 * Vomit the PHP configuration on the standard output.
 * @author Julien <youlweb@hotmail.com>
 */
class PhpInfo
{
    /**
     * Output the PHP configuration.
     *
     * A {@link http://php.net/manual/en/function.phpinfo.php constant} can be used to filter the output.
     * @param int $what Constant used to customize the output.
     * @return bool TRUE on success, FALSE otherwise.
     */
    public static function vomit($what = INFO_ALL)
    {
        return phpinfo($what);
    }
}