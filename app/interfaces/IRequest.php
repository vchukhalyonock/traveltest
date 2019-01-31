<?php

namespace App\Interfaces;

/**
 * Interface IRequest
 *
 * Interface for classes contain results of the requests
 *
 * @package App\Interfaces
 */
interface IRequest {

    /**
     * IRequest constructor.
     * @param $curlResult mixed Result of the object implements {@see ICurl} interface
     */
    public function __construct($curlResult);


    /**
     * Method getCode
     *
     * Return response HTTP-code (For example 200 OK, 404 Not found)
     *
     * @return int
     */
    public function getCode(): int;

    /**
     * Method getBody
     *
     * Return page source code
     *
     * @return string page source
     */
    public function getBody(): string;

    /**
     * Method getLoadTime
     *
     * Return page load time
     *
     * @return float
     */
    public function getLoadTime(): float;
}