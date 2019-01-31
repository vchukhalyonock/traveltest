<?php

namespace App\Interfaces;

/**
 * Interface ICurl
 * @package App\Interfaces
 */
interface ICurl {

    /**
     * @param string $url
     * @return IRequest
     */
    public function request(string $url): IRequest;
}