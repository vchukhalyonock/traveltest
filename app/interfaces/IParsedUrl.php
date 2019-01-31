<?php

namespace App\Interfaces;

interface IParsedUrl {

    public function __construct(string $proto, string $host, string $link);
    public function getHost(): string;
    public function getProto(): string;
    public function getLink(): string;
}