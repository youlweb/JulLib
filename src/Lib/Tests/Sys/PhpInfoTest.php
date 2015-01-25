<?php

/*
 * This file is part of the JulLib package.
 *
 * © 2014 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Sys;

use Jul\Lib\Sys\PhpInfo;

class PhpInfoTest extends \PHPUnit_Framework_TestCase
{
    public function testVomit()
    {
        ob_start();
        $this->assertTrue(PhpInfo::vomit());
        ob_end_clean();
    }
}