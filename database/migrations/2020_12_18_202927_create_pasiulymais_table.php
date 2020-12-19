<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiulymaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiulymais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('pradzia');
            $table->date('pabaiga');
            $table->string('informacija');
            $table->string('pavadinimas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiulymais');
    }
}
