<?php

namespace App\Interfaces;

interface IBaseLink {

    public function __construct(string $baseUrl);
    public function getProto(): string;
    public function getHost(): string;
    public function getLink(): string;
}