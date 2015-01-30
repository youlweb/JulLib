<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Tokenizer;

use Jul\Lib\String\Tokenizer\Delimiter;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class DelimiterTest extends \PHPUnit_Framework_TestCase
{
    const EXCEPTION = 'Jul\Lib\String\Tokenizer\TokenizerException';

    public function testConstructThrowsExceptionIfDelimiterTooShort()
    {
        $this->setExpectedException(self::EXCEPTION);
        new Delimiter('');
    }

    public function testTokenize()
    {
        $whiteSpacer = new Delimiter(' ');
        $this->assertEquals(['foo', 'bar'], $whiteSpacer->tokenize('foo bar'));
    }

    public function testTokenizeWithEmptyString()
    {
        $fullStopper = new Delimiter('.');
        $this->assertEquals([], $fullStopper->tokenize(''));
    }

    public function testTokenizeNoTokenFound()
    {
        $questioner = new Delimiter(' ');
        $this->assertEquals(['foo'], $questioner->tokenize('foo'));
    }
}
