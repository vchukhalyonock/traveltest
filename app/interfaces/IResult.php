<?php

namespace App\Interfaces;

/**
 * Interface IResult
 * @package App\Interfaces
 */
interface IResult {

    /**
     * IResult constructor.
     * @param ILink $link
     * @param int $imgTags
     * @param float $loadTime
     */
    public function __construct(ILink $link, int $imgTags, float $loadTime);

    /**
     * @return ILink
     */
    public function getLink():ILink;

    /**
     * @return int
     */
    public function getImgTags():int;

    /**
     * @return float
     */
    public function getLoadTime():float;
}