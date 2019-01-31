<?php

namespace App\Classes;

use App\Interfaces\IResult;
use App\Interfaces\IResultStorage;


/**
 * Class ResultStorage
 *
 * Results storage. Implementing as Iterator
 *
 * @see IResultStorage
 * @see IResult
 * @link http://php.net/manual/ru/class.iterator.php
 * @package App\Interfaces
 */
class ResultStorage implements IResultStorage, \Iterator {

    /**
     * Array of the results
     *
     * @var array
     */
    private $_results = [];

    /**
     * Current index. Used by iterator
     *
     * @var int
     */
    private $_currentIndex = 0;

    /**
     * Method addResult
     *
     * @see IResultStorage::addResult()
     * @param IResult $result
     * @return void
     */
    public function addResult(IResult $result) {
        $this->_results[] = $result;
    }

    /**
     * Method sortByImageTags
     *
     * @see IResultStorage::sortByImageTags()
     */
    public function sortByImageTags() {
        usort($this->_results, function ($result1, $result2){
            if($result1->getImgTags() == $result2->getImgTags())
                return 0;
            return ($result1->getImgTags() < $result2->getImgTags()) ? -1 : 1;
        });
    }

    /**
     * Method valid
     *
     * @link http://php.net/manual/ru/class.iterator.php
     * @return bool
     */
    public function valid() {
        return isset($this->_results[$this->_currentIndex]);
    }

    /**
     * Method rewind
     *
     * @link http://php.net/manual/ru/class.iterator.php
     */
    public function rewind() {
        $this->_currentIndex = 0;
    }

    /**
     * Method next
     *
     * @link http://php.net/manual/ru/class.iterator.php
     */
    public function next() {
        ++$this->_currentIndex;
    }

    /**
     * Method key
     *
     * @link http://php.net/manual/ru/class.iterator.php
     * @return int
     */
    public function key() {
        return $this->_currentIndex;
    }

    /**
     * Method current
     *
     * @link http://php.net/manual/ru/class.iterator.php
     * @return mixed
     */
    public function current() {
        return $this->_results[$this->_currentIndex];
    }
}