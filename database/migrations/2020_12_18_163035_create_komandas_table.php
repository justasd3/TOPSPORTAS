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

        DB::table('komandas')->insert(
            array(
                'created_at' => '2020-10-05',
                'updated_at' => '2020-12-21',
                'laimejimai' => '123',
                'pralaimejimai' => '246',
                'pavadinimas' => 'Rytas',
                'tipas' => '1',
		        'string' => '1',
		        'kontaktai' => 'rytas@basketball.com',
	        )
        );

        DB::table('komandas')->insert(
            array(
                'created_at' => '2020-10-17',
                'updated_at' => '2020-12-21',
                'laimejimai' => '200',
                'pralaimejimai' => '100',
                'pavadinimas' => 'Žalgiris',
                'tipas' => '1',
		        'string' => '1',
		        'kontaktai' => 'žalgiris@basketball.com',
	        )
        );

        DB::table('komandas')->insert(
            array(
                'created_at' => '2020-11-09',
                'updated_at' => '2020-12-21',
                'laimejimai' => '64',
                'pralaimejimai' => '53',
                'pavadinimas' => 'Dzūkija',
                'tipas' => '1',
		        'string' => '1',
		        'kontaktai' => 'dzūkija@basketball.com',
	        )
        );

        DB::table('komandas')->insert(
            array(
                'created_at' => '2020-12-01',
                'updated_at' => '2020-12-21',
                'laimejimai' => '100',
                'pralaimejimai' => '100',
                'pavadinimas' => 'Neptūnas',
                'tipas' => '1',
		        'string' => '1',
		        'kontaktai' => 'neptūnas@basketball.com',
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
        Schema::dropIfExists('komandas');
    }
}
