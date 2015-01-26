<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Sys;

use Jul\Lib\Sys\PhpInfo;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class PhpInfoTest extends \PHPUnit_Framework_TestCase
{
    public function testVomit()
    {
        ob_start();
        $this->assertTrue(PhpInfo::vomit());
        ob_end_clean();
    }
}