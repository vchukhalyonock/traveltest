<?php

namespace App\Classes;

use App\Interfaces\ILinkStorage;

/**
 * Class LinkStorage
 * @package App\Classes
 */
class LinkStorage implements ILinkStorage, \Iterator {

    /**
     * @var array
     */
    private $_links = [];

    /**
     * @var int
     */
    private $_currentIndex = 0;

    /**
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
     * @return mixed
     */
    public function current() {
        return $this->_links[$this->_currentIndex];
    }

    /**
     * @return int
     */
    public function key() {
        return $this->_currentIndex;
    }

    /**
     *
     */
    public function next() {
        ++$this->_currentIndex;
    }

    /**
     *
     */
    public function rewind() {
        $this->_currentIndex = 0;
    }

    /**
     * @return bool
     */
    public function valid() {
        return isset($this->_links[$this->_currentIndex]);
    }
}