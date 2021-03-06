<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Tokenizer;

use Jul\Lib\String\Tokenizer\Delimiter;
use Jul\Lib\String\Tokenizer\SuffixArray;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class SuffixArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testSetSort()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals(['001', '01', '1'], $suffixArray->tokenize('001'));
        $suffixArray->setSort(SORT_NATURAL);
        $this->assertEquals(['1', '01', '001'], $suffixArray->tokenize('001'));
    }

    public function testSetSortUnknownFlagDoesNothing()
    {
        $suffixArray = new SuffixArray();
        $suffixArray->setSort(45);
        $this->assertEquals(['001', '01', '1'], $suffixArray->tokenize('001'));
    }

    public function testTokenize()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals(['foo bar', 'oo bar', 'o bar', ' bar', 'bar', 'ar', 'r'],
            $suffixArray->tokenize('foo bar'));
    }

    public function testTokenizeDelimiter()
    {
        $suffixArray = new SuffixArray($this->getDelimiter(', '));
        $this->assertEquals(['foo, bar, baz', 'bar, baz', 'baz'],
            $suffixArray->tokenize(', foo, bar, , baz, , '));
    }

    public function testTokenizeDelimiterNotFound()
    {
        $suffixArray = new SuffixArray($this->getDelimiter('-'));
        $this->assertEquals(['foo bar baz'],
            $suffixArray->tokenize('foo bar baz'));
    }

    public function testTokenizeDelimiterSorted()
    {
        $suffixArray = new SuffixArray($this->getDelimiter(' '));
        $this->assertEquals(['bar baz', 'baz', 'foo bar baz'],
            $suffixArray->setSort()->tokenize('foo bar baz'));
    }

    public function testTokenizeEmptyString()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals([], $suffixArray->tokenize(''));
    }

    public function testTokenizeSorted()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals([' bar', 'ar', 'bar', 'foo bar', 'o bar', 'oo bar', 'r'],
            $suffixArray->setSort()->tokenize('foo bar'));
    }

    /**
     * @param string $delimiter
     * @return Delimiter
     */
    private function getDelimiter($delimiter)
    {
        return new Delimiter($delimiter);
    }
}
