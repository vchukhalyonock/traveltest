<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;

/**
 * Class MailTo
 *
 * Validation if link is a 'mailto:'
 *
 * @see IValidator
 * @package App\Classes\Validators
 */
class MailTo implements IValidator {

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
        return stristr($url, "mailto:") !== false;
    }
}