<?php

namespace App\Interfaces;

interface IRequest {
    public function __construct($curlResult);
    public function getCode(): int;
    public function getBody(): string;
    public function getLoadTime(): float;
}