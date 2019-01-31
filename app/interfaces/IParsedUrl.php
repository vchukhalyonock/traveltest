<?php

namespace App\Interfaces;

/**
 * Interface IParsedUrl
 *
 * Interface like {@see IBaseLink}, but only for not base links from grabbed links
 *
 * @package App\Interfaces
 */
interface IParsedUrl {

    /**
     * IParsedUrl constructor.
     * @param string $proto protocol (http, https etc)
     * @param string $host host name
     * @param string $link other path of the link
     */
    public function __construct(string $proto, string $host, string $link);

    /**
     * Method getHost
     *
     * Return host
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Method getProto
     *
     * Return protocol
     *
     * @return string
     */
    public function getProto(): string;

    /**
     * Method getLink
     *
     * Return other part of URL
     *
     * @return string
     */
    public function getLink(): string;
}