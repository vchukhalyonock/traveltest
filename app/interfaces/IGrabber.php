<?php

namespace App\Interfaces;

/**
 * Interface IGrabber
 *
 * Facade for grab processing page requested by URL and fill class implements {@see IResultStorage}
 *
 * @package App\Interfaces
 */
interface IGrabber {

    /**
     * Method run
     *
     * Run grabbing process
     *
     * @param string $baseUrl URL of the requested page
     * @return IResultStorage class implements {@see IResultStorage} interface
     */
    static public function run(string $baseUrl): IResultStorage;
}