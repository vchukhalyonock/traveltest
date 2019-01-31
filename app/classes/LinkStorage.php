<?php

namespace App\Classes;

use App\Interfaces\ILinkStorage;

class LinkStorage implements ILinkStorage, \Iterator {

    private $_links = [];
    private $_currentIndex = 0;

    public function addLink(string $link, int $depth = 0) {
        if(!$this->_exists($link)) {
            $this->_links[] = new Link($link, $depth);
        }
    }

    private function _exists(string $link): bool {
        foreach ($this->_links as $linkObject) {
            if($linkObject->getLink() == $link || $linkObject->getLink() == "$link/") {
                return true;
            }
        }

        return false;
    }

    public function current() {
        return $this->_links[$this->_currentIndex];
    }

    public function key() {
        return $this->_currentIndex;
    }

    public function next() {
        ++$this->_currentIndex;
    }

    public function rewind() {
        $this->_currentIndex = 0;
    }

    public function valid() {
        return isset($this->_links[$this->_currentIndex]);
    }
}