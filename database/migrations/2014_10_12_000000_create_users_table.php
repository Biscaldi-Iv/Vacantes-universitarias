<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('tipodoc');
            $table->bigInteger('ndoc');
            $table->integer('privilegio');
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['tipodoc', 'ndoc']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
