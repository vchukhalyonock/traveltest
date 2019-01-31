<?php

namespace App\Interfaces;

/**
 * Interface IRequest
 * @package App\Interfaces
 */
interface IRequest {

    /**
     * IRequest constructor.
     * @param $curlResult
     */
    public function __construct($curlResult);

    /**
     * @return int
     */
    public function getCode(): int;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @return float
     */
    public function getLoadTime(): float;
}