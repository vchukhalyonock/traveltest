<?php

namespace App\Classes;

use App\Interfaces\IParsedUrl;

/**
 * Class ParsedUrl
 *
 * Class for representation found url as object
 *
 * @see IParsedUrl
 * @package App\Classes
 */
class ParsedUrl implements IParsedUrl {

    /**
     * Protocol (http, https etc.)
     *
     * @var string
     */
    protected $_proto;

    /**
     * Host name
     *
     * @var string
     */
    protected $_host;

    /**
     * Other part of the link
     *
     * @var string
     */
    protected $_link;

    /**
     * ParsedUrl constructor.
     * @param string $proto
     * @param string $host
     * @param string $link
     */
    public function __construct(string $proto, string $host, string $link) {
        $this->_proto = $proto;
        $this->_host = $host;
        $this->_link = $link;
    }

    /**
     * Method getLink
     *
     * @see IParsedUrl::getLink()
     * @return string
     */
    public function getLink(): string {
        return $this->_link;
    }

    /**
     * Method getHost
     *
     * @see IParsedUrl::getHost()
     * @return string
     */
    public function getHost(): string {
        return $this->_host;
    }


    /**
     * Method getProto
     *
     * @see IParsedUrl::getProto()
     * @return string
     */
    public function getProto(): string {
        return $this->_proto;
    }
}