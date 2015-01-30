<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Tokenizer;

use Jul\Lib\String\Tokenizer\RepeatedSubstring;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class RepeatedSubstringTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenize()
    {
        $repeatedSubstring = new RepeatedSubstring();
        $this->assertEquals([' ', ' b', ' ba', 'a', 'b', 'ba', 'o'], $repeatedSubstring->tokenize('foo bar baz'));
    }

    public function testTokenizeWithLength()
    {
        $repeatedSubstring = new RepeatedSubstring(2);
        $this->assertEquals([' b', ' ba', 'ba'], $repeatedSubstring->tokenize('foo bar baz'));
    }

    public function testTokenizeWithDelimiter()
    {
        $repeatedSubstring = new RepeatedSubstring(1,' ');
        $this->assertEquals([], $repeatedSubstring->tokenize('it is what it is'));
    }
}
