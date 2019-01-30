<?php

namespace App\Classes;

use App\Interfaces\ICurl;
use App\Interfaces\IRequest;

class Curl implements ICurl {

    /**
     * @param string $url
     * @return IRequest
     */
    public function request(string $url): IRequest {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $body = curl_exec($ch);
        $result = curl_getinfo($ch);

        $request = new Request([$body, $result]);

        curl_close($ch);

        return $request;
    }
}