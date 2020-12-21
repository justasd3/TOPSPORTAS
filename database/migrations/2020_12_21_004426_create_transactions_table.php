<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('kiekis');
            $table->boolean('papildymas');
            $table->date('data');
            $table->integer('ZaidejoId');
        });

        DB::table('transactions')->insert(
            array(
                'kiekis' => '40',
                'papildymas' => true,
                'data' => '2020-12-21',
                'ZaidejoId' => '1',
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
        Schema::dropIfExists('transactions');
    }
}
