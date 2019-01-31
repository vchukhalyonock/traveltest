<?php

namespace App\Interfaces;

/**
 * Interface ILink
 *
 * Interface for class which represents page URL
 *
 * @package App\Interfaces
 */
interface ILink {

    /**
     * ILink constructor.
     * @param string $link full URL for page
     * @param int $depth depth in site map structure
     */
    public function __construct(string $link, int $depth);

    /**
     * Method getLink
     *
     * Return URL
     *
     * @return string
     */
    public function getLink():string;

    /**
     * Method getDepth
     *
     * Return depth
     *
     * @return int
     */
    public function getDepth():int;
}