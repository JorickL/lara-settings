<?php

namespace JorickL\LaraSettings\Exceptions;

use InvalidArgumentException;

class KeyAlreadyTakenException extends InvalidArgumentException
{
    public static function set(string $key)
    {
        return new static("A key with the name {$key} does already exists.");
    }
}