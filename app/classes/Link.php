<?php

namespace App\Classes;

use App\Interfaces\ILink;

/**
 * Class Link
 * @package App\Classes
 */
class Link implements ILink {

    protected $_link;
    protected $_depth;

    /**
     * Link constructor.
     * @param string $link
     * @param int $depth
     */
    public function __construct(string $link, int $depth) {
        $this->_link = $link;
        $this->_depth = $depth;
    }

    /**
     * @return string
     */
    public function getLink(): string {
        return $this->_link;
    }


    /**
     * @return int
     */
    public function getDepth(): int {
        return $this->_depth;
    }
}