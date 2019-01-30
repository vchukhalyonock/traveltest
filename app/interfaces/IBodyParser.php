<?php

namespace App\Interfaces;

interface IBodyParser {

    public function __construct(string $body);
    public function getLinks(): array;
    public function getImages(): array;
}