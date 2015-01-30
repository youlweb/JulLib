<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Property;

use Jul\Lib\String\Property\Length;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class LengthTest extends \PHPUnit_Framework_TestCase
{
    public function testValue()
    {
        $length = new Length();
        $this->assertEquals(7, $length->value('foo bar'));
        $this->assertEquals(0, $length->value(''));
    }
}
