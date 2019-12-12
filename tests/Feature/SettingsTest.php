<?php

namespace JorickL\LaraSettings\Tests\Feature;

use JorickL\LaraSettings\Models\Setting;
use JorickL\LaraSettings\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JorickL\LaraSettings\Exceptions\KeyAlreadyTakenException;

class SettingsTest extends TestCase 
{
    use RefreshDatabase;
    
    /** @test */
    function it_will_store_a_setting()
    {
        $setting = Setting::create(
            [
                'key' => 'test',
                'value' => 'some_value'
            ]
        );

        $this->assertEquals('test', $setting->key);
        $this->assertEquals('some_value', $setting->value);
    }

    
    /** @test */
    function a_setting_is_set()
    {
        $attributes = [
            'key' => 'A Key',
            'value' => 'true',
        ];

        $setting = Setting::set($attributes);
        $this->assertEquals('A Key', $setting->key);
        $this->assertEquals('true', $setting->value);
    }
    
    /** @test */
    function an_error_is_thrown_when_no_attributes_are_specified()
    {
        $this->expectException('TypeError');
        $setting = Setting::set();
    }
    
    /** @test */
    function an_error_is_thrown_when_there_is_already_a_setting_with_given_key()
    {
        $this->expectExceptionMessage('A key with the name keyA does already exists.');
        $settingA = Setting::set(['key' => 'keyA', 'value' => 'valueA']);
        $settingB = Setting::set(['key' => 'keyA', 'value' => 'valueB']);

        $this->assertDatabaseHas('settings', ['key' => 'keyA', 'value' => 'valueA']);
        $this->assertDatabaseMissing('settings', ['key' => 'keyA', 'value' => 'valueB']);
    }
}