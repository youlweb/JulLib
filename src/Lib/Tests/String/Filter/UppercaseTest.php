<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Filter;

use Jul\Lib\String\Filter\Uppercase;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class UppercaseTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter()
    {
        $uppercase = new Uppercase();
        $this->assertEquals('FOO BAR', $uppercase->filter('Foo Bar'));
    }
}
