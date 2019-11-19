<?php

namespace JorickL\LaraSettings\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;
    
    protected function getPackageProviders($app)
    {
        return [
            'JorickL\LaraSettings\Providers\LaraSettingsServiceProvider'
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        
    }

}