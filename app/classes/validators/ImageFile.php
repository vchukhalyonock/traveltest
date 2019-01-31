<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;

class ImageFile implements IValidator {

    static public function check(IBaseLink $baseLink, string $url): bool {
        return strripos($url, '.jpg', -1) !== false ||
            strripos($url, '.png', -1) !== false;
    }
}