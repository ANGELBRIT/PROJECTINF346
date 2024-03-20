<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users");
            $table->unsignedBigInteger("id_cours");
            $table->foreign("id_cours")->references("id")->on("cours");
            $table->unsignedBigInteger("progression");
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
        Schema::dropIfExists('user_cours');
    }
}