<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\IBodyParser;
use App\Interfaces\ILinkProcessor;

/**
 * Class LinkProcessor
 *
 * Found link processing according base URL of the site
 *
 * @see ILinkProcessor
 * @package App\Classes
 */
class LinkProcessor implements ILinkProcessor {

    /**
     * Base Link object
     *
     * @see IBaseLink
     * @var IBaseLink
     */
    private $_baseLink;

    /**
     * LinkProcessor constructor.
     *
     * @see IBaseLink
     * @see BaseLink
     * @param IBaseLink $baseLink
     */
    public function __construct(IBaseLink $baseLink) {
        $this->_baseLink = $baseLink;
    }


    /**
     * Method isRelative
     *
     * @see ILinkProcessor::isRelative()
     * @param string $link
     * @return bool
     */
    public function isRelative(string $link): bool {
        return !(stripos($link, "://") > 0);
    }


    /**
     * Method makeFullLink
     *
     * @see ILinkProcessor::makeFullLink()
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
     * Method removeAnchor
     *
     *
     * @see ILinkProcessor::removeAnchor()
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