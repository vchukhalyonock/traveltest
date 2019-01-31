<?php

namespace App\Classes;

use App\Interfaces\IBodyParser;

/**
 * Class BodyParser
 *
 * Parsing page source and extract useful information
 *
 * @see IBodyParser
 * @package App\Classes
 */
class BodyParser implements IBodyParser {

    private $_body;

    /**
     * BodyParser constructor.
     * @param string $body
     */
    public function __construct(string $body) {
        $this->_body = $body;
    }

    /**
     * Method getImages
     *
     * @see IBodyParser::getImages()
     * @return array
     */
    public function getImages(): array {
        return $this->_findByRegExp('/<img/')[0];
    }


    /**
     * Method getLinks
     *
     * @see IBodyParser::getLinks()
     * @return array
     */
    public function getLinks(): array {
        $result = [];
        $matches = $this->_findByRegExp('/(<a[^>]*)href=(\"?)([^\s\">]+?)(\"?)([^>]*>)/ismU');

        foreach ($matches[3] as $match)
            $result[] = str_replace(['"', "'"], "", $match);

        return $result;
    }


    /**
     * Method _findByRegExp
     *
     * Method for extracting info using regular expressions
     *
     * @param string $regExp
     * @return array
     */
    private function _findByRegExp(string $regExp): array {
        $matches = [];
        preg_match_all($regExp, $this->_body, $matches);
        return $matches;
    }
}