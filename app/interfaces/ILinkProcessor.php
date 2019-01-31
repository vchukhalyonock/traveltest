<?php

namespace App\Interfaces;

/**
 * Interface ILinkProcessor
 *
 * For processing links using object implement {@see App\Interfaces\IBaseLink} interface
 * as base to processing all other site URLS
 *
 * @package App\Interfaces
 */
interface ILinkProcessor {

    /**
     * ILinkProcessor constructor.
     * @param IBaseLink $baseLink
     */
    public function __construct(IBaseLink $baseLink);

    /**
     * Method isRelative
     *
     * Check that grabbed link from page is relative
     *
     * @param string $link
     * @return bool
     */
    public function isRelative(string $link): bool;

    /**
     * Method makeFullLink
     *
     * Make correct full link from the relative grabbed link
     *
     * @param string $link
     * @return string
     */
    public function makeFullLink(string $link): string;


    /**
     * Method removeAnchor
     *
     * Remove anchor from link URL
     *
     * @param string $link
     * @return string
     */
    public function removeAnchor(string $link): string;
}