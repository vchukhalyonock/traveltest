<?php

namespace App\Classes;

use App\Interfaces\ILink;
use App\Interfaces\ILinkStorage;

/**
 * Class LinkStorage
 *
 * Link storage. Implementing as Iterator
 *
 * @see ILink
 * @see Link
 * @link http://php.net/manual/ru/class.iterator.php
 * @package App\Classes
 */
class LinkStorage implements ILinkStorage, \Iterator {

    /**
     * Array of the links
     *
     * @var array
     */
    private $_links = [];

    /**
     * current Index (Used By Iterator)
     *
     * @var int
     */
    private $_currentIndex = 0;

    /**
     * Method addLink
     *
     * @see ILinkStorage::addLink()
     * @param string $link
     * @param int $depth
     * @return void
     */
    public function addLink(string $link, int $depth = 0) {
        if(!$this->_exists($link)) {
            $this->_links[] = new Link($link, $depth);
        }
    }

    /**
     * Method _exists
     *
     * Check that same link is already in storage
     *
     * @param string $link
     * @return bool
     */
    private function _exists(string $link): bool {
        foreach ($this->_links as $linkObject) {
            if($linkObject->getLink() == $link || $linkObject->getLink() == "$link/") {
                return true;
            }
        }

        return false;
    }

    /**
     * Method current
     *
     * @link http://php.net/manual/ru/class.iterator.php
     * @return mixed
     */
    public function current() {
        return $this->_links[$this->_currentIndex];
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
     * Method next
     *
     * @link http://php.net/manual/ru/class.iterator.php
     */
    public function next() {
        ++$this->_currentIndex;
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
     * Method valid
     *
     *
     * @link http://php.net/manual/ru/class.iterator.php
     * @return bool
     */
    public function valid() {
        return isset($this->_links[$this->_currentIndex]);
    }
}