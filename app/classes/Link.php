<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILink;

class Link implements ILink {

    private $_baseLink;

    /**
     * Link constructor.
     * @param IBaseLink $baseLink
     */
    public function __construct(IBaseLink $baseLink) {
        $this->_baseLink = $baseLink;
    }


    /**
     * @param string $link
     * @return bool
     */
    public function isRelative(string $link): bool {
        $proto = $this->_baseLink->getProto();
        return stripos("{$proto}://", $link) !== 0;
    }


    /**
     * @param string $link
     * @return string
     */
    public function makeFullLink(string $link): string {
        if($this->isRelative($link)) {
            $leadSlash = strpos("/", $link) == 0 ? '' : '/';
            return $this->_baseLink->getProto() . '://' . $this->_baseLink->getHost()
                . $leadSlash . $this->removeAnchor($link);
        }

        return $this->removeAnchor($link);
    }


    /**
     * @param string $link
     * @return string
     * @throws \Exception
     */
    public function removeAnchor(string $link): string {
        $result = [];
        if(preg_match("/(.*)(#+)(.*)$/", $link, $result))
            return $result[1];

        throw new \Exception("Link::removeAnchor bad regular expression or base url");
    }
}