<?php

namespace App\Interfaces;

interface IRequest {
    public function __construct(mixed $curlResult);
    public function getCode(): int;
    public function getBody(): string;
}