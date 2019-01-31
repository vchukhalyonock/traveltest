<?php

namespace App\Classes;

use App\Interfaces\IRequest;

/**
 * Class Request
 *
 * Contains result of the request for page
 *
 * @see IRequest
 * @package App\Classes
 */
class Request implements IRequest {

    /**
     * Full request result
     *
     * @var mixed
     */
    private $_curlResult;

    /**
     * Page source
     *
     * @var
     */
    private $_body;

    /**
     * Response Http-code
     *
     * @var
     */
    private $_code;

    /**
     * Page load time
     *
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
     * Method getBody
     *
     * @see IRequest::getBody()
     * @return string
     */
    public function getBody(): string {
        return $this->_body;
    }


    /**
     * Method getCode
     *
     * @see IRequest::getCode()
     * @return int
     */
    public function getCode(): int {
        return $this->_code;
    }

    /**
     * Method getLoadTime
     *
     * @see IRequest::getLoadTime()
     * @return float
     */
    public function getLoadTime(): float {
        return $this->_totalTime;
    }


    /**
     * Method _extractBody
     *
     * Extracts page source from request result
     */
    private function _extractBody() {
        $this->_body = $this->_curlResult[0];
    }

    /**
     * Method _extractCode
     *
     * Set Http-code from response
     */
    private function _extractCode() {
        $this->_code = $this->_curlResult[1]['http_code'];
    }


    /**
     * Method _extractTotalTime
     *
     * Set page load time from response
     */
    private function _extractTotalTime() {
        $this->_totalTime = $this->_curlResult[1]['total_time'];
    }
}