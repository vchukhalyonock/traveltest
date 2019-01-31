<?php

namespace App\Interfaces;

/**
 * Interface IResultStorage
 *
 * Describes {@see IResult} storage interface
 *
 * @package App\Interfaces
 */
interface IResultStorage {

    /**
     * Method addResult
     *
     * Add one result to storage
     *
     * @param IResult $result
     * @return mixed
     */
    public function addResult(IResult $result);

    /**
     * Method sortByImageTags
     *
     * Sorting results by number of the founded img tags
     *
     * @return mixed
     */
    public function sortByImageTags();
}