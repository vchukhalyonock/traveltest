<?php

namespace App\Interfaces;


/**
 * Interface ILinkStorage
 *
 * Interface of the storage for links implements {@see ILink} interface
 *
 * @package App\Interfaces
 */
interface ILinkStorage {

    /**
     * Method addLink
     *
     * Add link to storage
     *
     * @param string $link
     * @param int $depth
     * @return mixed
     */
    public function addLink(string $link, int $depth = 0);
}