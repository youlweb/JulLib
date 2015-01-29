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
        $property = new ClosureProperty(function ($string, $multiply, $subtract) {
            return strlen($string) * $multiply - $subtract;
        });
        $this->assertEquals(10, $property->value('foo', 4, 2));
    }

    public function testValueWithSingleArgument()
    {
        $property = new ClosureProperty(function ($string) {
            return strlen($string);
        });
        $this->assertEquals(3, $property->value('foo'));
    }
}
