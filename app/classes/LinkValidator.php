<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILinkValidator;

class LinkValidator implements ILinkValidator {

    private $_baseLink;

    public function __construct(IBaseLink $baseLink) {
        $this->_baseLink = $baseLink;
    }

    /**
     * @param string $link
     * @return bool
     */
    private function _isRemoteUrl(string $link): bool {
        return stripos($link, $this->_baseLink->getProto() . '://' . $this->_baseLink->getHost()) !== 0;
    }


    private function _isJSLink(string $link): bool {
        return stristr($link, "javascript:void(0)") !== false;
    }


    private function _isMailTo(string  $link): bool {
        return stristr($link, "mailto:") !== false;
    }


    /**
     * @param string $link
     * @return bool
     */
    public function check(string $link): bool {
        return !$this->_isRemoteUrl($link) && !$this->_isJSLink($link) && !$this->_isMailTo($link);
    }
}