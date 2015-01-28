<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Property;

/**
 * A measure of the complexity of a string.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class MetricEntropy implements PropertyInterface
{
    /** @inheritDoc */
    public function value($string)
    {
        $h = 0;
        $size = strlen($string);
        foreach (count_chars($string, 1) as $v) {
            $p = $v / $size;
            $h -= $p * log($p) / log(2);
        }
        return $h;
    }
}