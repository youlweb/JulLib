<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Property;

/**
 * Shannon entropy property.
 *
 * Allows to estimate the average minimum number of bits needed to encode
 * a string of symbols based on the alphabet size and the frequency of
 * the symbols. {@link http://www.shannonentropy.netmark.pl Read more}.
 * @author Julien <youlweb@hotmail.com>
 */
class ShannonEntropy implements PropertyInterface
{
    /**
     * @var int
     */
    private $_precision;

    /**
     * @param int $precision The floating point precision can be determined.
     */
    public function __construct($precision = null)
    {
        $this->_precision = $precision;
    }

    /**
     * Return the average number of bits needed to encode the input string.
     *
     * @param string $string
     * @return float
     */
    public function of($string)
    {
        $h = 0;
        $size = strlen($string);
        foreach (count_chars($string, 1) as $v) {
            $p = $v / $size;
            $h -= $p * log($p) / log(2);
        }
        if (null === $this->_precision) {
            return $h;
        }
        return round($h, $this->_precision);
    }
}