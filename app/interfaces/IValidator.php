<?php

namespace App\Interfaces;

/**
 * Interface IValidator
 *
 * Describe validator for found link
 *
 * @package App\Interfaces
 */
interface IValidator {

    /**
     * Method check
     *
     * @param IBaseLink $baseLink Base link {@see IBaseLink}
     * @param string $url found link
     * @return bool check result
     */
    static public function check(IBaseLink $baseLink, string $url): bool;
}