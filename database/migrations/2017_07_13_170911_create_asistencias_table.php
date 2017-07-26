<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Premiacion.asistencia', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idingresante')->unique();
            $table->boolean('asistio')->default(false);
            $table->boolean('sorteo')->default(false);
            $table->string('observacion')->nullable();
            
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
        Schema::dropIfExists('Premiacion.asistencia');
    }
}
