<?php

namespace App\Interfaces;

/**
 * Interface IGrabber
 * @package App\Interfaces
 */
interface IGrabber {

    /**
     * @param string $baseUrl
     * @return IResultStorage
     */
    static public function run(string $baseUrl): IResultStorage;
}