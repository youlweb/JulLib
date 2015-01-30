<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Tokenizer;

use Jul\Lib\String\Tokenizer\Tokenizer;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class TokenizerTest extends \PHPUnit_Framework_TestCase
{
    const EXCEPTION = 'Jul\Lib\String\Tokenizer\TokenizerException';

    public function testConstructThrowsExceptionIfDelimiterTooShort()
    {
        $this->setExpectedException(self::EXCEPTION);
        new Tokenizer('');
    }

    public function testTokenize()
    {
        $tokenizer = new Tokenizer(' ');
        $this->assertEquals(['foo', 'bar'], $tokenizer->tokenize('foo bar'));
    }

    public function testTokenizeEmptyString()
    {
        $tokenizer = new Tokenizer(' ');
        $this->assertEquals([], $tokenizer->tokenize(''));
    }

    public function testTokenizeNoTokenFound()
    {
        $tokenizer = new Tokenizer(' ');
        $this->assertEquals(['foo'], $tokenizer->tokenize('foo'));
    }
}
