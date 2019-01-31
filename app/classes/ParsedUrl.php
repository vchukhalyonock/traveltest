<?php

namespace App\Classes;

use App\Interfaces\IParsedUrl;

class ParsedUrl implements IParsedUrl {

    protected $_proto;
    protected $_host;
    protected $_link;

    public function __construct(string $proto, string $host, string $link) {
        $this->_proto = $proto;
        $this->_host = $host;
        $this->_link = $link;
    }

    public function getLink(): string {
        return $this->_link;
    }

    public function getHost(): string {
        return $this->_host;
    }

    public function getProto(): string {
        return $this->_proto;
    }
}