<?php

namespace App\Classes;

use App\Interfaces\ICurl;
use App\Interfaces\IRequest;

/**
 * Class Curl
 *
 * Facade for using CURL
 *
 * @see ICurl
 * @package App\Classes
 */
class Curl implements ICurl {

    /**
     * Method request
     *
     * @see ICurl::request()
     * @param string $url
     * @return IRequest
     */
    public function request(string $url): IRequest {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");

        $body = curl_exec($ch);
        $result = curl_getinfo($ch);

        $request = new Request([$body, $result]);

        curl_close($ch);

        return $request;
    }
}