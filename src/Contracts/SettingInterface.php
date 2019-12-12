<?php

namespace JorickL\LaraSettings\Contracts;

interface SettingInterface
{
    public static function get(array $attributes);

    public static function set($atrributes = null);
}