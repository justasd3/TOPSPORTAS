<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIvykiaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivykiais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('pradzia');
            $table->integer('trukme');
            $table->double('koeficientas_1');
            $table->double('koeficientas_2');
            $table->string('komanda_1');
            $table->string('komanda_2');
            $table->string('rezultatas')->nullable();
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ivykiais');
    }
}
