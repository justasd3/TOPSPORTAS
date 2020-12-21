<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->string('Komanda');
            $table->integer('Statymo_suma');
            $table->integer('ZaidejoId');
            $table->integer('IvykioId');
            $table->integer('Mokejimo_statusas')->default(0);
        });

        DB::table('bets')->insert(
            array(
                'Komanda' => 'Žalgiris',
                'Statymo_suma' => '60',
                'ZaidejoId' => '1',
                'IvykioId' => '1',
            )
        );

        DB::table('bets')->insert(
            array(
                'Komanda' => 'Dzūkija',
                'Statymo_suma' => '30',
                'ZaidejoId' => '1',
                'IvykioId' => '2',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
