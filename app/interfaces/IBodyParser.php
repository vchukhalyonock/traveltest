<?php

namespace App\Interfaces;

/**
 * Interface IBodyParser
 *
 * The interface of the class containing the source code of the page
 * and the selection of the necessary information from it
 *
 * @package App\Interfaces
 */
interface IBodyParser {

    /**
     * IBodyParser constructor.
     *
     * @param string $body page source code
     */
    public function __construct(string $body);


    /**
     * Method getLinks
     *
     * @return array of the found links
     */
    public function getLinks(): array;


    /**
     * Method getImages
     *
     * @return array of the found images tags
     */
    public function getImages(): array;
}