<?php

namespace App\Interfaces;


/**
 * Interface ILinkStorage
 * @package App\Interfaces
 */
interface ILinkStorage {

    /**
     * @param string $link
     */
    static public function addLink(string $link): void;

    /**
     * @param int $index
     * @return string
     */
    static public function getLink(integer $index): string;


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