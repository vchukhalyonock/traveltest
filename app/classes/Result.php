<?php

namespace App\Classes;

use App\Interfaces\ILink;
use App\Interfaces\IResult;

/**
 * Class Result
 *
 * One result of the investigating
 *
 * @see IResult
 * @see ILink
 * @see Link
 * @package App\Classes
 */
class Result implements IResult {

    /**
     * Link of the page
     *
     * @var ILink
     */
    protected $_link;

    /**
     * Number of Img tags
     *
     * @var int
     */
    protected $_imgTags;

    /**
     * Page load time
     *
     * @var float
     */
    protected $_loadTime;

    /**
     * Result constructor.
     * @param ILink $link
     * @param int $imgTags
     * @param float $loadTime
     */
    public function __construct(ILink $link, int $imgTags,float $loadTime) {
        $this->_link = $link;
        $this->_imgTags = $imgTags;
        $this->_loadTime = $loadTime;
    }

    /**
     * Method getLink
     *
     * @see IResult::getLink()
     * @return ILink
     */
    public function getLink(): ILink {
        return $this->_link;
    }


    /**
     * Method getImgTags
     *
     * @see IResult::getImgTags()
     * @return int
     */
    public function getImgTags(): int {
        return $this->_imgTags;
    }

    /**
     * Method getLoadTime
     *
     * @see IResult::getLoadTime()
     * @return float
     */
    public function getLoadTime(): float {
        return $this->_loadTime;
    }
}