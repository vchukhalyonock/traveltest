<?php

namespace App\Classes;

use App\Interfaces\ILink;
use App\Interfaces\IResult;

class Result implements IResult {

    protected $_link;
    protected $_imgTags;
    protected $_loadTime;

    public function __construct(ILink $link, int $imgTags,float $loadTime) {
        $this->_link = $link;
        $this->_imgTags = $imgTags;
        $this->_loadTime = $loadTime;
    }

    public function getLink(): ILink {
        return $this->_link;
    }


    public function getImgTags(): int {
        return $this->_imgTags;
    }

    public function getLoadTime(): float {
        return $this->_loadTime;
    }
}