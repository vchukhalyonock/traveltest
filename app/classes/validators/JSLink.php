<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;

/**
 * Class JSLink
 * @package App\Classes\Validators
 */
class JSLink implements IValidator {

    /**
     * @param IBaseLink $baseLink
     * @param string $url
     * @return bool
     */
    static public function check(IBaseLink $baseLink, string $url): bool {
        return stristr($url, "javascript:void(0)") !== false;
    }
}