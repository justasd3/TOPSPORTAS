<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komandas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('laimejimai')->nullable();
            $table->integer('pralaimejimai')->nullable();
            $table->string('pavadinimas')->nullable();
            $table->string('tipas')->nullable();
            $table->string('string')->nullable();
            $table->string('kontaktai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komandas');
    }
}
