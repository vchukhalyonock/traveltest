<?php

namespace App\Interfaces;

/**
 * Class ResultStorage
 * @package App\Interfaces
 */
class ResultStorage implements IResultStorage, \Iterator {

    /**
     * @var array
     */
    private $_results = [];

    /**
     * @var int
     */
    private $_currentIndex = 0;

    /**
     * @param IResult $result
     * @return void
     */
    public function addResult(IResult $result) {
        $this->_results[] = $result;
    }

    /**
     *
     */
    public function sortByImageTags() {
        usort($this->_results, function ($result1, $result2){
            if($result1->getImgTags() == $result2->getImgTags())
                return 0;
            return ($result1->getImgTags() < $result2->getImgTags()) ? -1 : 1;
        });
    }

    /**
     * @return bool
     */
    public function valid() {
        return isset($this->_results[$this->_currentIndex]);
    }

    /**
     *
     */
    public function rewind() {
        $this->_currentIndex = 0;
    }

    /**
     *
     */
    public function next() {
        ++$this->_currentIndex;
    }

    /**
     * @return int
     */
    public function key() {
        return $this->_currentIndex;
    }

    /**
     * @return mixed
     */
    public function current() {
        return $this->_results[$this->_currentIndex];
    }
}