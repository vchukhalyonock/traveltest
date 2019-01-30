<?php

namespace App\Interfaces;

interface ILink {

    public function __construct(IBaseLink $baseLink);
    public function isRelative(string $link): bool;
    public function makeFullLink(string $link): string;
    public function removeAnchor(string $link): string;
}