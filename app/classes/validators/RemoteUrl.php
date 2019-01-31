<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;
use App\Classes\URLParser;

/**
 * Class RemoteUrl
 *
 * Validation if link is a remote URL (not from grabbed site)
 *
 * @see IValidator
 * @package App\Classes\Validators
 */
class RemoteUrl implements IValidator {

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
        $testLinkParsed = URLParser::parse($url);
        return $testLinkParsed->getHost() !== $baseLink->getHost();
    }
}