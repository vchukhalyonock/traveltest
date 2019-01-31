<?php

namespace App\Interfaces;

/**
 * Interface IReport
 * @package App\Interfaces
 */
interface IReport {

    /**
     * @param IBaseLink $baseLink
     * @param IResultStorage $resultStorage
     * @param string $folder
     * @return mixed
     */
    static public function generate(IBaseLink $baseLink, IResultStorage $resultStorage, string $folder);
}