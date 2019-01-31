<?php

namespace App\Interfaces;

/**
 * Interface IURLParser
 *
 * Describes class for URL parsing
 *
 * @see IParsedUrl
 * @package App\Interfaces
 */
interface IURLParser {

    /**
     * Method parse
     *
     * Parsing page with url
     *
     * @param string $url page URL
     * @return IParsedUrl parsed page
     */
    static public function parse(string $url):IParsedUrl;
}