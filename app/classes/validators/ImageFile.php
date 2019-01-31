<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;

/**
 * Class ImageFile
 *
 * Validation if link is a image file
 *
 * @see IValidator
 * @package App\Classes\Validators
 */
class ImageFile implements IValidator {

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
        return strripos($url, '.jpg', -1) !== false ||
            strripos($url, '.png', -1) !== false;
    }
}