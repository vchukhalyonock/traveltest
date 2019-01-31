<?php

namespace App\Classes;

use App\Interfaces\ILink;
use App\Interfaces\IResult;

/**
 * Class Result
 * @package App\Classes
 */
class Result implements IResult {

    /**
     * @var ILink
     */
    protected $_link;

    /**
     * @var int
     */
    protected $_imgTags;

    /**
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
     * @return ILink
     */
    public function getLink(): ILink {
        return $this->_link;
    }


    /**
     * @return int
     */
    public function getImgTags(): int {
        return $this->_imgTags;
    }

    /**
     * @return float
     */
    public function getLoadTime(): float {
        return $this->_loadTime;
    }
}