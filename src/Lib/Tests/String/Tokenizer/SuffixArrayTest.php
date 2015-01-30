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
        $this->assertEquals(['bar', 'ar', 'r'], $suffixArray->tokenize('bar'));
    }

    public function testTokenizeEmptyString()
    {
        $suffixArray = new SuffixArray();
        $this->assertEquals([], $suffixArray->tokenize(''));
    }

    public function testTokenizeSorted()
    {
        $suffixArray = new SuffixArray(true);
        $this->assertEquals(['ar', 'bar', 'r'], $suffixArray->tokenize('bar'));
    }
}
