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
    private $_baseUrl;

    /**
     * @var string
     */
    private $_host;

    /**
     * @var string
     */
    private $_proto;

    /**
     * @var string
     */
    private $_link;

    /**
     * BaseLink constructor.
     * @param string $baseUrl
     */
    public function __construct(string $baseUrl) {
        $this->_baseUrl = $baseUrl;
        $this->_parseBaseUrl();
    }


    /**
     * @throws \Exception
     */
    private function _parseBaseUrl() {
        $result = [];
        if(preg_match("/^([a-zA-Z]+)(:\/\/)([a-zA-Z._+0-9-]+)(.*)$/", $this->_baseUrl, $result)) {
            if(count($result) < 5) {
                throw new \Exception("BaseLink::_parseBaseUrl bad regular expression or base url");
            }

            $this->_proto = $result[1];
            $this->_host = $result[3];
            $this->_link = $result[4];
            return;
        }

        throw new \Exception("BaseLink::_parseBaseUrl bad regular expression or base url");
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
    public function getLink(): string {
        return $this->_link;
    }

    /**
     * @return string
     */
    public function getProto(): string {
        return $this->_proto;
    }
}