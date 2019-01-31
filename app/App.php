<?php

namespace App;


use App\Classes\BaseLink;
use App\Classes\Grabber;
use App\Classes\Report;

class App {

    public function __construct(string $baseUrl, string $resultFolder) {
        $resultStorage = Grabber::run($baseUrl);
        $resultStorage->sortByImageTags();
        Report::generate(new BaseLink($baseUrl), $resultStorage, $resultFolder);
    }

}