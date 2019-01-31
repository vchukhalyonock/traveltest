<?php

namespace App\Interfaces;

/**
 * Interface IReport
 *
 * Interface for report generator
 *
 * @package App\Interfaces
 */
interface IReport {

    /**
     * Method generate
     *
     * Generate report
     *
     * @param IBaseLink $baseLink object implements {@see IBaseLink} interface contains base link information
     * @param IResultStorage $resultStorage object implements {@see IResultStorage} contains results
     * @param string $folder report file folder
     * @return mixed
     */
    static public function generate(IBaseLink $baseLink, IResultStorage $resultStorage, string $folder);
}