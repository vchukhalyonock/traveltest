<?php

namespace App\Interfaces;


/**
 * Interface ILinkStorage
 * @package App\Interfaces
 */
interface ILinkStorage extends \Iterator {

    /**
     * @param string $link
     * @param int $depth
     * @return mixed
     */
    public function addLink(string $link, int $depth = 0);
}