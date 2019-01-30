<?php

namespace App\Interfaces;

interface ICurl {
    public function request(string $url): IRequest;
}