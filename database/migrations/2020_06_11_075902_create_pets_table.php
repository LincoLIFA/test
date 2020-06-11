<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con usuario
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('type_id'); // Relación con usuario
            $table->foreign('type_id')->references('id')->on('type_pets');
            $table->string('name');
            $table->integer('edad')->nullable();
            $table->boolean('sexo');
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
        Schema::dropIfExists('pets');
    }
}
