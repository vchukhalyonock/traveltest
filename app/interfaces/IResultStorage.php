<?php

namespace App\Interfaces;

interface IResultStorage {

    /**
     * @param IResult $result
     * @return mixed
     */
    public function addResult(IResult $result);

    /**
     * @return mixed
     */
    public function sortByImageTags();
}