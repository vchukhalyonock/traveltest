<?php

namespace App;


use App\Classes\Grabber;

class App {

    private $resultStorage;

    public function __construct(string $baseUrl) {
        $this->resultStorage = Grabber::run($baseUrl);
        $this->resultStorage->sortByImageTags();
        foreach ($this->resultStorage as $result) {
            var_dump($result);
        }
    }

}