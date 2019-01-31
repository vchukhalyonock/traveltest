<?php

namespace App\Classes;

use App\Interfaces\IRequest;

/**
 * Class Request
 * @package App\Classes
 */
class Request implements IRequest {

    /**
     * @var mixed
     */
    private $_curlResult;

    /**
     * @var
     */
    private $_body;

    /**
     * @var
     */
    private $_code;

    /**
     * @var
     */
    private $_totalTime;

    /**
     * Request constructor.
     * @param mixed $curlResult
     */
    public function __construct($curlResult) {
        $this->_curlResult = $curlResult;
        $this->_extractBody();
        $this->_extractCode();
        $this->_extractTotalTime();
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
     * @return float
     */
    public function getLoadTime(): float {
        return $this->_totalTime;
    }


    /**
     *
     */
    private function _extractBody() {
        $this->_body = $this->_curlResult[0];
    }

    /**
     *
     */
    private function _extractCode() {
        $this->_code = $this->_curlResult[1]['http_code'];
    }


    /**
     *
     */
    private function _extractTotalTime() {
        $this->_totalTime = $this->_curlResult[1]['total_time'];
    }
}