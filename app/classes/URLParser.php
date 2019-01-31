<?php

namespace App\Classes;

use App\Interfaces\IParsedUrl;
use App\Interfaces\IURLParser;

/**
 * Class URLParser
 *
 * Class for parsing URL
 *
 * @see IURLParser
 * @see IParsedUrl
 * @package App\Classes
 */
class URLParser implements IURLParser {

    /**
     * Method parse
     *
     * @see IURLParser::parse()
     * @param string $url
     * @return IParsedUrl
     * @throws \Exception
     */
    static public function parse(string $url): IParsedUrl {
        $result = [];
        if(preg_match("/^([a-zA-Z]+)(:\/\/)([a-zA-Z._+0-9-]+)(.*)$/", $url, $result)) {
            if(count($result) < 5) {
                throw new \Exception("BaseLink::_parseBaseUrl bad regular expression or base url");
            }
            return new ParsedUrl($result[1], $result[3], $result[4]);
        }

        throw new \Exception("BaseLink::_parseBaseUrl bad regular expression or base url");
    }
}