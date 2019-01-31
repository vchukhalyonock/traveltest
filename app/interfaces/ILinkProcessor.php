<?php

namespace App\Interfaces;

/**
 * Interface ILinkProcessor
 * @package App\Interfaces
 */
interface ILinkProcessor {

    /**
     * ILinkProcessor constructor.
     * @param IBaseLink $baseLink
     */
    public function __construct(IBaseLink $baseLink);

    /**
     * @param string $link
     * @return bool
     */
    public function isRelative(string $link): bool;

    /**
     * @param string $link
     * @return string
     */
    public function makeFullLink(string $link): string;

    /**
     * @param string $link
     * @return string
     */
    public function removeAnchor(string $link): string;
}