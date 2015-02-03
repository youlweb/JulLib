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
        $this->assertEquals([' ', ' b', ' ba', 'a', 'b', 'ba', 'o'],
            $repeatedSubstring->tokenize('foo bar baz'));
    }

    public function testTokenizeEmptyString()
    {
        $repeatedSubstring = new RepeatedSubstring();
        $this->assertEquals([], $repeatedSubstring->tokenize(''));
    }

    public function testTokenizeMinLength()
    {
        $repeatedSubstring = new RepeatedSubstring(2);
        $this->assertEquals([' b', ' ba', 'ba'],
            $repeatedSubstring->tokenize('foo bar baz'));
    }

    public function testTokenizeUniqueResults()
    {
        $repeatedSubstring = new RepeatedSubstring();
        $this->assertEquals(['a', 'ab', 'b', 'ba', 'bab'],
            $repeatedSubstring->tokenize('babab'));
    }

    public function testTokenizeWithDelimiter()
    {
        $repeatedSubstring = new RepeatedSubstring(1, '*,');
        $this->assertEquals(['is', 'is*,it', 'it', 'this', 'this*,is', 'this*,is*,it'],
            $repeatedSubstring->tokenize('this*,is*,it*,this*,is*,it'));
    }

    public function testTokenizeWithDelimiterAndMinLength()
    {
        $repeatedSubstring = new RepeatedSubstring(3, ' ');
        $this->assertEquals(['is it', 'this', 'this is', 'this is it'],
            $repeatedSubstring->tokenize('this is it this is it'));
    }

    public function testTokenizeWithDelimiterNotFound()
    {
        $repeatedSubstring = new RepeatedSubstring(1, '*');
        $this->assertEquals([], $repeatedSubstring->tokenize('this is it this is it'));
    }

    public function testTokenizeWithDelimiterUniqueResults()
    {
        $repeatedSubstring = new RepeatedSubstring(1, ' ');
        $this->assertEquals(['is', 'is it', 'is it is', 'it', 'it is'],
            $repeatedSubstring->tokenize('is it is it is'));
    }
}
