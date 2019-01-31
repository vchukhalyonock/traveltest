<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILinkValidator;
use App\Interfaces\IValidator;

/**
 * Class LinkValidator
 *
 * Global class for validation links before send it to storage.
 * Uses IValidators classes for chain validation
 *
 * @see ILinkValidator
 * @see IValidator
 * @package App\Classes
 */
class LinkValidator implements ILinkValidator {

    /**
     * Base Link
     *
     * @see IBaseLink
     * @see BaseLink
     * @var IBaseLink
     */
    private $_baseLink;

    /**
     * List of the validator.
     * You can add any validator implements IValidator interface in validator class
     *
     * @see IValidator
     * @var array
     */
    private $_validators = [
      'JSLink',
      'MailTo',
      'RemoteUrl',
        'ImageFile'
    ];

    /**
     * Namespace for validator class
     *
     * @var string
     */
    private $_validatorsNamespase = "App\\Classes\\Validators\\";

    /**
     * LinkValidator constructor.
     * @param IBaseLink $baseLink
     */
    public function __construct(IBaseLink $baseLink) {
        $this->_baseLink = $baseLink;
    }


    /**
     * Method check
     *
     * @see ILinkValidator::check()
     * @param string $link
     * @return bool
     */
    public function check(string $link): bool {
        foreach ($this->_validators as $validator) {
            $validator = $this->_validatorsNamespase . $validator;
            if($validator::check($this->_baseLink, $link))
                return false;
        }

        return true;
    }
}