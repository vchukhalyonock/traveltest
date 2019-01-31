<?php

namespace App\Interfaces;

interface IGrabber {

    static public function run(string $baseUrl): IResultStorage;
}