<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNonceValueLength extends Migration
{
    private $prefix = '';

    public function __construct()
    {
        $this->prefix = config('laravel-lti.database.prefix');
    }

    public function up()
    {
        Schema::table('lti2_nonce', function (Blueprint $table) {
            $table->string('value', 255)->change();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('lti2_nonce', function (Blueprint $table) {
            $table->string('value', 32)->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
