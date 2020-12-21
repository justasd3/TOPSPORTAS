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

        DB::table('pasiulymais')->insert(
            array(
                'created_at' => '2020-12-18',
                'updated_at' => '2020-12-18',
                'pradzia' => '2020-12-21',
                'pabaiga' => '2020-12-31',
                'informacija' => 'Nauji įvykiai papigiai',
                'pavadinimas' => 'Akcija atrakcija',
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
        Schema::dropIfExists('pasiulymais');
    }
}
