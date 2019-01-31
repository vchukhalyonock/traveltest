<?php

namespace App\Classes;

use App\Interfaces\IParsedUrl;

/**
 * Class ParsedUrl
 * @package App\Classes
 */
class ParsedUrl implements IParsedUrl {

    /**
     * @var string
     */
    protected $_proto;

    /**
     * @var string
     */
    protected $_host;

    /**
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
     * @return string
     */
    public function getLink(): string {
        return $this->_link;
    }

    /**
     * @return string
     */
    public function getHost(): string {
        return $this->_host;
    }

    /**
     * @return string
     */
    public function getProto(): string {
        return $this->_proto;
    }
}