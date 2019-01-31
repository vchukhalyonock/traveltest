<?php

namespace App\Interfaces;

/**
 * Interface IBodyParser
 * @package App\Interfaces
 */
interface IBodyParser {

    /**
     * IBodyParser constructor.
     * @param string $body
     */
    public function __construct(string $body);

    /**
     * @return array
     */
    public function getLinks(): array;

    /**
     * @return array
     */
    public function getImages(): array;
}