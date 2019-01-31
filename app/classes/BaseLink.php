<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\IParsedUrl;

/**
 * Class BaseLink
 *
 * Implements {@see IBaseLink} interface.
 * Contains data for the Base Link of the grabbed site
 *
 * @see IBaseLink
 * @package App\Classes
 */
class BaseLink implements IBaseLink {

    /**
     * Base Url Link
     *
     * @var string
     */
    protected $_baseUrl;

    /**
     * Parsed Url class
     *
     * @see IParsedUrl
     * @var \App\Interfaces\IParsedUrl
     */
    protected $_parsedUrl;



    /**
     * BaseLink constructor.
     * @param string $baseUrl
     */
    public function __construct(string $baseUrl) {
        $this->_baseUrl = $baseUrl;
        $this->_parsedUrl = URLParser::parse($baseUrl);
    }

    /**
     * Method getHost
     *
     * @see IBaseLink::getHost()
     * @return string
     */
    public function getHost(): string {
        return $this->_parsedUrl->getHost();
    }

    /**
     * Method getLink
     *
     * @see IBaseLink::getLink()
     * @return string
     */
    public function getLink(): string {
        return $this->_parsedUrl->getLink();
    }


    /**
     * Method getProto
     *
     * @see IBaseLink::getProto()
     * @return string
     */
    public function getProto(): string {
        return $this->_parsedUrl->getProto();
    }
}