<?php

namespace App;

use App\Classes\BaseLink;
use App\Classes\BodyParser;
use App\Classes\Curl;
use App\Classes\Link;
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
        var_dump($this->_result);
    }


    private function _init() {
        $curl = new Curl();
        foreach ($this->_linkStorage as $link) {
            echo "Processing link $link\n";
            $request = $curl->request($link);
            $bodyParser = new BodyParser($request->getBody());
            $foundLinks = $bodyParser->getLinks();
            $numberOfImages = count($bodyParser->getImages());
            $this->_result[] = [
                'link' => $link,
                'imgTags' => $numberOfImages,
                'depth' => 0,
                'loadTime' => $request->getLoadTime()
            ];

            foreach ($foundLinks as $foundLink) {
                $linkObject = new Link($this->_baseLink);
                $fullLink = $linkObject->makeFullLink($foundLink);
                if($this->_linkValidator->check($fullLink)) {
                    $this->_linkStorage->addLink($fullLink);
                }
            }
            unset($bodyParser);
        }
    }
}