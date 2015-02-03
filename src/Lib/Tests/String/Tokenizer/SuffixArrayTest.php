<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Tokenizer;

use Jul\Lib\String\Tokenizer\SuffixArray;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class SuffixArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenize()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals(['foo bar', 'oo bar', 'o bar', ' bar', 'bar', 'ar', 'r'],
            $suffixArray->tokenize('foo bar'));
    }

    public function testTokenizeDelimiter()
    {
        $suffixArray = new SuffixArray(false, ', ');
        $this->assertEquals(['foo, bar, baz', 'bar, baz', 'baz'],
            $suffixArray->tokenize(', foo, bar, , baz, , '));
    }

    public function testTokenizeDelimiterNotFound()
    {
        $suffixArray = new SuffixArray(false, '-');
        $this->assertEquals(['foo bar baz'],
            $suffixArray->tokenize('foo bar baz'));
    }

    public function testTokenizeDelimiterSorted()
    {
        $suffixArray = new SuffixArray(true, ' ');
        $this->assertEquals(['bar baz', 'baz', 'foo bar baz'],
            $suffixArray->tokenize('foo bar baz'));
    }

    public function testTokenizeEmptyDelimiter()
    {
        $suffixArray = new SuffixArray(false, '');
        $this->assertEquals(['foo bar', 'oo bar', 'o bar', ' bar', 'bar', 'ar', 'r'],
            $suffixArray->tokenize('foo bar'));
    }

    public function testTokenizeEmptyString()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals([], $suffixArray->tokenize(''));
    }

    public function testTokenizeSorted()
    {
        $suffixArray = new SuffixArray(true);
        $this->assertEquals([' bar', 'ar', 'bar', 'foo bar', 'o bar', 'oo bar', 'r'],
            $suffixArray->tokenize('foo bar'));
    }
}
