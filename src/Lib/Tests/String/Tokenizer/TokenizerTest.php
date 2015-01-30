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
        $whiteSpacer = new Tokenizer(' ');
        $this->assertEquals(['foo', 'bar'], $whiteSpacer->tokenize('foo bar'));
    }

    public function testTokenizeWithEmptyString()
    {
        $fullStopper = new Tokenizer('.');
        $this->assertEquals([], $fullStopper->tokenize(''));
    }

    public function testTokenizeNoTokenFound()
    {
        $questioner = new Tokenizer(' ');
        $this->assertEquals(['foo'], $questioner->tokenize('foo'));
    }
}
