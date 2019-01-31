<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;

class MailTo implements IValidator {

    static public function check(IBaseLink $baseLink, string $url): bool {
        return stristr($url, "mailto:") !== false;
    }
}