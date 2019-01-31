<?php

namespace App\Interfaces;

interface IURLParser {

    static public function parse(string $url):IParsedUrl;
}