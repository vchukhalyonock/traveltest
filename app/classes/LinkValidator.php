<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILinkValidator;

class LinkValidator implements ILinkValidator {

    private $_baseLink;

    public function __construct(IBaseLink $baseLink) {
        $this->_baseLink = $baseLink;
    }

    private function _isRemoteUrl(string $link): bool {

    }


    private function _hasRedirect(string $link): bool {

    }


    /**
     * @param string $link
     * @return bool
     */
    public function check(string $link): bool {
        return !$this->_isRemoteUrl($link) && !$this->_hasRedirect($link);
    }
}