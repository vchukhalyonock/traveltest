<?php

namespace App\Interfaces;

/**
 * Interface ILink
 * @package App\Interfaces
 */
interface ILink {

    /**
     * ILink constructor.
     * @param string $link
     * @param int $depth
     */
    public function __construct(string $link, int $depth);

    /**
     * @return string
     */
    public function getLink():string;

    /**
     * @return int
     */
    public function getDepth():int;
}