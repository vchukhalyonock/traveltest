<?php

namespace App\Interfaces;

interface ILink {
    public function __construct(string $link, int $depth);
    public function getLink():string;
    public function getDepth():int;
}