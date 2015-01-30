<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Filter;
use Jul\Lib\String\Filter\Lowercase;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class LowercaseTest extends \PHPUnit_Framework_TestCase 
{
    public function testFilter()
    {
        $lowercase = new Lowercase();
        $this->assertEquals('foo bar', $lowercase->filter('Foo Bar'));
    }
}
