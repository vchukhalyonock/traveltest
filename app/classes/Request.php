<?php

namespace App\Classes;

use App\Interfaces\IRequest;

/**
 * Class Request
 * @package App\Classes
 */
class Request implements IRequest {

    private $_curlResult;
    private $_body;
    private $_code;

    /**
     * Request constructor.
     * @param mixed $curlResult
     */
    public function __construct(mixed $curlResult) {
        $this->_curlResult = $curlResult;
        $this->_extractBody();
        $this->_extractCode();
    }

    /**
     * @return string
     */
    public function getBody(): string {
        return $this->_body;
    }


    /**
     * @return int
     */
    public function getCode(): int {
        return $this->_code;
    }


    /**
     *
     */
    private function _extractBody() {
        $this->_body = $this->_curlResult[1];
    }

    /**
     *
     */
    private function _extractCode() {
        $this->_code = $this->_curlResult[0]['http_code'];
    }
}