<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;

/**
 * Class BaseLink
 * @package App\Classes
 */
class BaseLink implements IBaseLink {

    /**
     * @var string
     */
    protected $_baseUrl;
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
     * @return string
     */
    public function getHost(): string {
        return $this->_parsedUrl->getHost();
    }

    /**
     * @return string
     */
    public function getLink(): string {
        return $this->_parsedUrl->getLink();
    }

    /**
     * @return string
     */
    public function getProto(): string {
        return $this->_parsedUrl->getProto();
    }
}