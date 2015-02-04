<?php

/**
 * JulLib ©2015 Julien <youlweb@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Lib\String\Tokenizer;

/**
 * Break a string down into an array of terms using a delimiter.
 *
 * The delimiter is set at instantiation and cannot be changed.
 * @author Julien <youlweb@hotmail.com>
 */
class Delimiter implements DelimiterInterface
{
    /**
     * @var string
     */
    private $_delimiter;

    /**
     * @param string $delimiter The string used to break down the input string.
     * @throws TokenizerException If the delimiter is too short.
     */
    public function __construct($delimiter)
    {
        if (strlen($delimiter) < 1) {
            throw new TokenizerException('The delimiter is too short.');
        }
        $this->_delimiter = $delimiter;
    }

    /** {@inheritDoc} */
    public function getDelimiter()
    {
        return $this->_delimiter;
    }

    /**
     * Split the input string into an array of tokens.
     *
     * Empty elements present in the output array as a result of consecutive,
     * or leading/trailing delimiters are automatically removed.
     * @param string $string
     * @return string[]
     */
    public function tokenize($string)
    {
        return array_values(array_filter(explode($this->getDelimiter(), $string), 'strlen'));
    }
}