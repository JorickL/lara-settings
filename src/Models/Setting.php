<?php

namespace JorickL\LaraSettings\Models;

use Illuminate\Database\Eloquent\Model;
use JorickL\LaraSettings\Contracts\SettingInterface;
use JorickL\LaraSettings\Exceptions\KeyAlreadyTakenException;

class Setting extends Model implements SettingInterface
{
    // Set fillable properties
    public $fillable = [
        'key',
        'value',
    ];

    // Disable the timestamps 
    public $timestamps = false;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('larasettings.tableName'));
    }

    public static function set($attributes = null): Setting
    {
        if(static::where('key', $attributes['key'])->first()) {
            throw KeyAlreadyTakenException::set($attributes['key']);
        }
        return static::create($attributes);
    }

    public static function get($attributes): Setting
    {

    }
}