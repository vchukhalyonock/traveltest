<?php

namespace App\Interfaces;

/**
 * Interface IURLParser
 * @package App\Interfaces
 */
interface IURLParser {

    /**
     * @param string $url
     * @return IParsedUrl
     */
    static public function parse(string $url):IParsedUrl;
}