<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Filter;

use Jul\Lib\String\Filter\Whitespace;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class WhitespaceTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter()
    {
        $whitespace = new Whitespace();
        $this->assertEquals(' foo bar ', $whitespace->filter("\n\n\t   foo\t \n  bar  \n\n \t \r\r  "));
    }

    public function testFilterWithTrim()
    {
        $whitespace = new Whitespace(true);
        $this->assertEquals('foo bar', $whitespace->filter("\n\n\t   foo\t \n  bar  \n\n \t \r\r  "));
    }
}
