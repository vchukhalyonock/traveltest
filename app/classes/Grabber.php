<?php

namespace App\Classes;

use App\Interfaces\IGrabber;
use App\Interfaces\IResultStorage;


/**
 * Class Grabber
 *
 * Extracting useful info from site
 *
 * @see IGrabber
 * @package App\Classes
 */
class Grabber implements IGrabber {

    /**
     * Method run
     *
     * @see IGrabber::run()
     * @see IResultStorage
     * @param string $baseUrl
     * @return IResultStorage
     */
    static public function run(string $baseUrl): IResultStorage {
        $linkStorage = new LinkStorage();
        $linkStorage->addLink($baseUrl);
        $resultStorage = new ResultStorage();
        $baseLink = new BaseLink($baseUrl);
        $linkValidator = new LinkValidator($baseLink);
        $curl = new Curl();

        foreach ($linkStorage as $link) {
            echo "Processing link {$link->getLink()}\n";
            $currentDepth = $link->getDepth();
            $request = $curl->request($link->getLink());
            $bodyParser = new BodyParser($request->getBody());
            $foundLinks = $bodyParser->getLinks();
            $numberOfImages = count($bodyParser->getImages());
            $resultStorage->addResult(new Result($link, $numberOfImages, $request->getLoadTime()));

            foreach ($foundLinks as $foundLink) {
                $linkProcessor = new LinkProcessor($baseLink);
                $fullLink = $linkProcessor->makeFullLink($foundLink);
                if($linkValidator->check($fullLink)) {
                    $linkStorage->addLink($fullLink, $currentDepth + 1);
                }
            }
            unset($bodyParser);
        }

        return $resultStorage;
    }
}