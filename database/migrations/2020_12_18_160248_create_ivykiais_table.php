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
            $table->time('laikas');
        });

        DB::table('ivykiais')->insert(
            array(
                'pradzia' => '2020-12-31',
                'trukme' => '90',
                'koeficientas_1' => '2.5',
                'koeficientas_2' => '1.5',
                'komanda_1' => 'Rytas',
                'komanda_2' => 'Žalgiris',
                'status' => false,
                'laikas' => '12:05',
            )
        );

        DB::table('ivykiais')->insert(
            array(
                'pradzia' => '2020-12-31',
                'trukme' => '90',
                'koeficientas_1' => '0.8',
                'koeficientas_2' => '1.2',
                'komanda_1' => 'Dzūkija',
                'komanda_2' => 'Neptūnas',
                'status' => false,
                'laikas' => '12:05',
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
        Schema::dropIfExists('ivykiais');
    }
}
