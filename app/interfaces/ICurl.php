<?php

namespace App\Interfaces;

/**
 * Interface ICurl
 *
 * Class interface for sending requests and receiving
 * responses from the server using curl
 *
 * @package App\Interfaces
 */
interface ICurl {

    /**
     * Method request
     *
     * Makes request to URL and return class implements {@see IRequest} interface
     *
     * @param string $url request page URL
     * @return IRequest class implemented {@see IRequest} interface
     */
    public function request(string $url): IRequest;
}