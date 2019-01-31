<?php

namespace App\Interfaces;

/**
 * Interface IBaseLink
 *
 * Describes the interface class for storing information about the link
 * to the main page of the site being searched
 *
 * @package App\Interfaces
 */
interface IBaseLink {

    /**
     * IBaseLink constructor.
     *
     * @param string $baseUrl site index URL
     */
    public function __construct(string $baseUrl);

    /**
     * Method getProto
     *
     * Returns the name of the protocol received from URL (http, https etc.)
     *
     * @return string
     */
    public function getProto(): string;

    /**
     * Method getHost
     *
     * Returns the hostname received from URL
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Method getLink
     *
     * Returns other part of the received URL
     *
     * @return string
     */
    public function getLink(): string;
}