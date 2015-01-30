<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\Math\Functions;

use Jul\Lib\Math\Functions\Log;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class LogTest extends \PHPUnit_Framework_TestCase
{
    public function testF()
    {
        $log = new Log();
        $this->assertEquals(log(5), $log->f(5));
    }

    public function testFWithBase()
    {
        $log = new Log(2);
        $this->assertEquals(log(5, 2), $log->f(5));
    }
}
