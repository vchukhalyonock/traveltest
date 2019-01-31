<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILinkValidator;

/**
 * Class LinkValidator
 * @package App\Classes
 */
class LinkValidator implements ILinkValidator {

    /**
     * @var IBaseLink
     */
    private $_baseLink;

    /**
     * @var array
     */
    private $_validators = [
      'JSLink',
      'MailTo',
      'RemoteUrl',
        'ImageFile'
    ];

    /**
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