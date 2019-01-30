<?php

namespace App\Classes;

use App\Interfaces\ILinkStorage;

class LinkStorage implements ILinkStorage {

    private $_links = [];
    private $_currentIndex = 0;

    public function addLink(string $link): void {
        if(!in_array($link, $this->_links)) {
            $this->_links[] = $link;
        }
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