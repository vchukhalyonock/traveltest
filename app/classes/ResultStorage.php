<?php

namespace App\Interfaces;

class ResultStorage implements IResultStorage, \Iterator {

    private $_results = [];
    private $_currentIndex = 0;

    public function addResult(IResult $result) {
        $this->_results[] = $result;
    }

    public function sortByImageTags() {
        usort($this->_results, function ($result1, $result2){
            if($result1->getImgTags() == $result2->getImgTags())
                return 0;
            return ($result1->getImgTags() < $result2->getImgTags()) ? -1 : 1;
        });
    }

    public function valid() {
        return isset($this->_results[$this->_currentIndex]);
    }

    public function rewind() {
        $this->_currentIndex = 0;
    }

    public function next() {
        ++$this->_currentIndex;
    }

    public function key() {
        return $this->_currentIndex;
    }

    public function current() {
        return $this->_results[$this->_currentIndex];
    }
}