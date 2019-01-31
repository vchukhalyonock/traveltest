<?php

namespace App\Interfaces;

/**
 * Interface IParsedUrl
 * @package App\Interfaces
 */
interface IParsedUrl {

    /**
     * IParsedUrl constructor.
     * @param string $proto
     * @param string $host
     * @param string $link
     */
    public function __construct(string $proto, string $host, string $link);

    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getProto(): string;

    /**
     * @return string
     */
    public function getLink(): string;
}