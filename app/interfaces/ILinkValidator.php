<?php

namespace App\Interfaces;

/**
 * Interface ILinkValidator
 * @package App\Interfaces
 */
interface ILinkValidator {

    /**
     * ILinkValidator constructor.
     * @param IBaseLink $baseLink
     */
    public function __construct(IBaseLink $baseLink);

    /**
     * @param string $link
     * @return bool
     */
    public function check(string $link): bool;

}