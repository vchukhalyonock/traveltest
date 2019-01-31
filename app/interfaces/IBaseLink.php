<?php

namespace App\Interfaces;

/**
 * Interface IBaseLink
 *
 * @package App\Interfaces
 */
interface IBaseLink {

    /**
     * IBaseLink constructor.
     * @param string $baseUrl
     */
    public function __construct(string $baseUrl);

    /**
     * @return string
     */
    public function getProto(): string;

    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getLink(): string;
}