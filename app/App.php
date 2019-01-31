<?php

namespace App;


use App\Classes\BaseLink;
use App\Classes\Grabber;
use App\Classes\Report;

/**
 * Class App
 *
 * Main application class
 *
 * @package App
 */
class App {

    /**
     * App constructor.
     * @param string $baseUrl
     * @param string $resultFolder
     */
    public function __construct(string $baseUrl, string $resultFolder) {
        $resultStorage = Grabber::run($baseUrl);
        $resultStorage->sortByImageTags();
        Report::generate(new BaseLink($baseUrl), $resultStorage, $resultFolder);
    }

}