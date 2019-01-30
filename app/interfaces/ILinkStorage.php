<?php

namespace App\Interfaces;


/**
 * Interface ILinkStorage
 * @package App\Interfaces
 */
interface ILinkStorage extends \Iterator {

    /**
     * @param string $link
     */
    public function addLink(string $link): void;
}