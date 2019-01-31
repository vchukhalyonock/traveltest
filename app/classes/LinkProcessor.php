<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILinkProcessor;

class LinkProcessor implements ILinkProcessor {

    private $_baseLink;

    /**
     * LinkProcessor constructor.
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
        return stripos($link, "{$proto}://") !== 0;
    }


    /**
     * @param string $link
     * @return string
     */
    public function makeFullLink(string $link): string {
        if($this->isRelative($link)) {
            $leadSlash = strpos( $link, "/") === 0 ? '' : '/';
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
        if(strpos($link, '#') === false)
            return $link;
        if(strpos($link, '#') === 0)
            return '';
        if(preg_match("/(.*)(#+?)(.*)$/", $link, $result) !== false)
            return $result[1];

        throw new \Exception("LinkProcessor::removeAnchor bad regular expression or base url");
    }
}