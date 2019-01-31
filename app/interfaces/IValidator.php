<?php

namespace App\Interfaces;

interface IValidator {

    /**
     * @param IBaseLink $baseLink
     * @param string $url
     * @return bool
     */
    static public function check(IBaseLink $baseLink, string $url): bool;
}