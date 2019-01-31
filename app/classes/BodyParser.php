<?php

namespace App\Classes;

use App\Interfaces\IBodyParser;

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
     * @return array
     */
    public function getImages(): array {
        return $this->_findByRegExp('/<img/')[0];
    }


    /**
     * @return array
     */
    public function getLinks(): array {
        $result = [];
        $matches = $this->_findByRegExp('/(<a[^>]*)href=(\"?)([^\s\">]+?)(\"?)([^>]*>)/ismU');

        foreach ($matches[3] as $match)
            $result[] = $match;

        return $result;
    }


    /**
     * @param string $regExp
     * @return array
     */
    private function _findByRegExp(string $regExp): array {
        $matches = [];
        preg_match_all($regExp, $this->_body, $matches);
        return $matches;
    }
}