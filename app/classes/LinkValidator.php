<?php

namespace App\Classes;

use App\Interfaces\IBaseLink;
use App\Interfaces\ILinkValidator;

class LinkValidator implements ILinkValidator {

    private $_baseLink;
    private $_validators = [
      'JSLink',
      'MailTo',
      'RemoteUrl',
        'ImageFile'
    ];
    private $_validatorsNamespase = "App\\Classes\\Validators\\";

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