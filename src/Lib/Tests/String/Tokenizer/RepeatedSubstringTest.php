<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Tokenizer;

use Jul\Lib\String\Tokenizer\Delimiter;
use Jul\Lib\String\Tokenizer\RepeatedSubstring;
use Jul\Lib\String\Tokenizer\SuffixArray;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class RepeatedSubstringTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenize()
    {
        $repeatedSubstring = $this->getTokenizer();
        $this->assertEquals([' ', ' b', ' ba', 'a', 'b', 'ba', 'o'],
            $repeatedSubstring->tokenize('foo bar baz'));
    }

    public function testTokenizeEmptyString()
    {
        $repeatedSubstring = $this->getTokenizer();
        $this->assertEquals([], $repeatedSubstring->tokenize(''));
    }

    public function testTokenizeMinLength()
    {
        $repeatedSubstring = $this->getTokenizer(2);
        $this->assertEquals([' b', ' ba', 'ba'],
            $repeatedSubstring->tokenize('foo bar baz'));
    }

    public function testTokenizeUniqueResults()
    {
        $repeatedSubstring = $this->getTokenizer();
        $this->assertEquals(['a', 'ab', 'b', 'ba', 'bab'],
            $repeatedSubstring->tokenize('babab'));
    }

    public function testTokenizeWithDelimiter()
    {
        $repeatedSubstring = $this->getTokenizer(1, '*,');
        $this->assertEquals(['is', 'is*,it', 'it', 'this', 'this*,is', 'this*,is*,it'],
            $repeatedSubstring->tokenize('this*,is*,it*,this*,is*,it'));
    }

    public function testTokenizeWithDelimiterAndMinLength()
    {
        $repeatedSubstring = $this->getTokenizer(3, ' ');
        $this->assertEquals(['is it', 'this', 'this is', 'this is it'],
            $repeatedSubstring->tokenize('this is it this is it'));
    }

    public function testTokenizeWithDelimiterNotFound()
    {
        $repeatedSubstring = $this->getTokenizer(1, '*');
        $this->assertEquals([], $repeatedSubstring->tokenize('this is it this is it'));
    }

    public function testTokenizeWithDelimiterUniqueResults()
    {
        $repeatedSubstring = $this->getTokenizer(1, ' ');
        $this->assertEquals(['is', 'is it', 'is it is', 'it', 'it is'],
            $repeatedSubstring->tokenize('is it is it is'));
    }

    /**
     * @param int $min_length
     * @param string $delimiter
     * @return RepeatedSubstring
     */
    private function getTokenizer($min_length = 1, $delimiter = null)
    {
        if ($delimiter) {
            $delimiter = new Delimiter($delimiter);
        }
        $suffixArray = new SuffixArray($delimiter);
        return new RepeatedSubstring($suffixArray, $min_length);
    }
}
