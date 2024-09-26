<?php

namespace App\Factories\Contracts;

/**
 * @template T of object
 */
interface SimpleFactory
{
    /**
     * @return T
     */
    public static function create();
}