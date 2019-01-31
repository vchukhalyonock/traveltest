<?php

namespace App\Interfaces;

/**
 * Interface ILinkValidator
 *
 * Interface for validator which check link corrections before add this one to storage
 *
 * @package App\Interfaces
 */
interface ILinkValidator {

    /**
     * ILinkValidator constructor
     *
     * @param IBaseLink $baseLink object of the class implements {@see IBaseLink} interface
     */
    public function __construct(IBaseLink $baseLink);

    /**
     * Method check
     *
     * Main check method
     *
     * @param string $link
     * @return bool
     */
    public function check(string $link): bool;

}