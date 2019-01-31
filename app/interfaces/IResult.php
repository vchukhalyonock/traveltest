<?php

namespace App\Interfaces;

/**
 * Interface IResult
 *
 * Result of the one page investigating
 *
 * @package App\Interfaces
 */
interface IResult {

    /**
     * IResult constructor.
     *
     * @param ILink $link page link. Class which implements {@see ILink} interface
     * @param int $imgTags numbers of found IMG tags
     * @param float $loadTime page load time
     */
    public function __construct(ILink $link, int $imgTags, float $loadTime);

    /**
     * Method getLink
     *
     * Return {@see ILink} class for page link
     *
     * @return ILink
     */
    public function getLink():ILink;


    /**
     * Method getImgTags
     *
     * Return number of the img tags
     *
     * @return int
     */
    public function getImgTags():int;


    /**
     * Method getLoadTime
     *
     * Return page load time
     *
     * @return float
     */
    public function getLoadTime():float;
}