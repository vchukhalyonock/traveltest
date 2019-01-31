<?php

namespace App\Classes\Validators;

use App\Interfaces\IBaseLink;
use App\Interfaces\IValidator;
use App\Classes\URLParser;

/**
 * Class RemoteUrl
 * @package App\Classes\Validators
 */
class RemoteUrl implements IValidator {

    /**
     * @param IBaseLink $baseLink
     * @param string $url
     * @return bool
     */
    static public function check(IBaseLink $baseLink, string $url): bool {
        $testLinkParsed = URLParser::parse($url);
        return $testLinkParsed->getHost() !== $baseLink->getHost();
    }
}