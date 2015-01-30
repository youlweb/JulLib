<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Property;

use Jul\Lib\String\Property\ClosureProperty;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class ClosurePropertyTest extends \PHPUnit_Framework_TestCase
{
    public function testValueWithMultipleArguments()
    {
        $hash = new ClosureProperty(function ($string, $algo = 'sha512') {
            return hash($algo, $string);
        });
        $this->assertEquals('acbd18db4cc2f85cedef654fccc4a4d8', $hash->value('foo', 'md5'));
    }

    public function testValueWithSingleArgument()
    {
        $length = new ClosureProperty(function ($string) {
            return strlen($string);
        });
        $this->assertEquals(3, $length->value('foo'));
    }
}
