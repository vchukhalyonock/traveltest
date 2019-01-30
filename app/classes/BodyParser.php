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
        return $this->_findByRegExp('/<img\s.*?src="(.+?)".*?>/');
    }


    /**
     * @return array
     */
    public function getLinks(): array {
        return $this->_findByRegExp('/<a\s.*?href="(.+?)".*?>(.+?)<\/a>/');
    }


    /**
     * @param string $regExp
     * @return array
     */
    private function _findByRegExp(string $regExp): array {
        $result = [];
        $matches = [];
        preg_match_all($regExp, $this->_body, $matches);

        foreach ($matches[1] as $match)
            $result[] = $match[1];

        return $result;
    }
}