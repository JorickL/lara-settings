<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    
    public function up()
    {
        Schema::create(config('larasettings.tableName'), function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->string('value');
        });
    }

    public function down()
    {
        Schema::drop(config('larasettings.tableName'));
    }
}