<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subname')->nullable();
            $table->string('email')->unique();
            $table->string('image');
            $table->integer("type");
            $table->string('password');
            $table->float('prix')->nullable();
            $table->string('name_formation')->nullable();
            $table->string('sexe')->nullable();
            $table->string('tel')->nullable();
            $table->boolean('status');
            $table->string('cv')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
}
