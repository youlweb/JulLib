<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\Tests\String\Property;

use Jul\Lib\String\Property\ShannonEntropy;

/**
 * The values used for this test were calculated using the link below.
 *
 * @link http://www.shannonentropy.netmark.pl
 * @author Julien <youlweb@hotmail.com>
 */
class ShannonEntropyTest extends \PHPUnit_Framework_TestCase
{
    public function testValue()
    {
        $entropy = new ShannonEntropy();
        $this->assertEquals(2.52, round($entropy->of('foo bar'), 2));
    }

    public function testValueWithFloatingPointPrecision()
    {
        $entropy = new ShannonEntropy(5);
        $this->assertEquals(2.52164, $entropy->of('foo bar'));
    }

    public function testValueWithFloatingPointPrecisionZero()
    {
        $entropy = new ShannonEntropy(0);
        $this->assertEquals(3, $entropy->of('foo bar'));
    }
}
