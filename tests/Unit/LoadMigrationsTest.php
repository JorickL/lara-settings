<?php

namespace JorickL\LaraSettings\Tests\Unit;

use Illuminate\Support\Facades\DB;
use JorickL\LaraSettings\Tests\TestCase;

class LoadMigrationsTest extends TestCase
{
    
    /** @test */
    function migrations_are_loaded_on_setup()
    {
        DB::table('settings')->insert([
            'key' => 'enable_settings',
            'value' => true,
        ]);

        $setting = DB::table('settings')->where('id', 1)->first();
        $this->assertEquals('enable_settings', $setting->key);
        $this->assertEquals(1, $setting->value);
    }
}