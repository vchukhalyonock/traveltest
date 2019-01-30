<?php

namespace App\Interfaces;


/**
 * Interface ILinkStorage
 * @package App\Interfaces
 */
interface ILinkStorage {

    /**
     * @param ILink $link
     */
    static public function addLink(ILink $link): void;

    /**
     * @param int $index
     * @return ILink
     */
    static public function getLink(integer $index): ILink;


    /**
     * @param integer $index
     * @return bool
     */
    static public function setCurrentIndex(integer $index): boolean;


    /**
     * @return bool
     */
    static public function getCurrentIndex(): boolean;
}