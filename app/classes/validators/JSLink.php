<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;

/**
 * Class JSLink
 *
 * Validation if link is a javascript method run
 *
 * @see IValidator
 * @package App\Classes\Validators
 */
class JSLink implements IValidator {

    /**
     * Method check
     *
     * @see IValidator::check()
     * @see IBaseLink
     * @param IBaseLink $baseLink
     * @param string $url
     * @return bool
     */
    static public function check(IBaseLink $baseLink, string $url): bool {
        return stristr($url, "javascript:void(0)") !== false;
    }
}