<?php

namespace App\Classes;

use App\Interfaces\ILink;

/**
 * Class Link
 *
 * One Link of the site
 *
 * @see ILink
 * @package App\Classes
 */
class Link implements ILink {

    /**
     * Link
     *
     * @var string
     */
    protected $_link;

    /**
     * Link depth in the sitemap structure
     *
     * @var int
     */
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
     * Method getLink
     *
     * @see ILink::getLink()
     * @return string
     */
    public function getLink(): string {
        return $this->_link;
    }


    /**
     * Method getDepth
     *
     * @see ILink::getDepth()
     * @return int
     */
    public function getDepth(): int {
        return $this->_depth;
    }
}