<?php

namespace App;

use App\Classes\BaseLink;
use App\Classes\BodyParser;
use App\Classes\Curl;
use App\Classes\LinkProcessor;
use App\Classes\LinkStorage;
use App\Classes\LinkValidator;

class App {

    private $_linkStorage;
    private $_linkValidator;
    private $_baseLink;
    private $_result = [];

    public function __construct(string $baseUrl) {
        $this->_linkStorage = new LinkStorage();
        $this->_linkStorage->addLink($baseUrl);
        $this->_baseLink = new BaseLink($baseUrl);
        $this->_linkValidator = new LinkValidator($this->_baseLink);

        $this->_init();
        $this->_sortByImageNumbers();
        var_dump($this->_result);
    }


    private function _init() {
        $curl = new Curl();
        foreach ($this->_linkStorage as $link) {
            echo "Processing link {$link->getLink()}\n";
            $currentDepth = $link->getDepth();
            $request = $curl->request($link->getLink());
            $bodyParser = new BodyParser($request->getBody());
            $foundLinks = $bodyParser->getLinks();
            $numberOfImages = count($bodyParser->getImages());
            $this->_result[] = [
                'link' => $link->getLink(),
                'imgTags' => $numberOfImages,
                'depth' => $currentDepth,
                'loadTime' => $request->getLoadTime()
            ];

            foreach ($foundLinks as $foundLink) {
                $linkProcessor = new LinkProcessor($this->_baseLink);
                $fullLink = $linkProcessor->makeFullLink($foundLink);
                if($this->_linkValidator->check($fullLink)) {
                    $this->_linkStorage->addLink($fullLink, $currentDepth + 1);
                }
            }
            unset($bodyParser);
        }
    }


    private function _sortByImageNumbers() {
        usort($this->_result, function ($a, $b){
            if($a['imgTags'] == $b['imgTags'])
                return 0;
            return ($a['imgTags'] > $b['imgTags']) ? -1 : 1;
        });
    }
}