<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Premiacion.informacion', function (Blueprint $table) {
            $table->increments('id');

            $table->mediumText('informacion')->nullable();
            $table->string('firma_1')->nullable();
            $table->string('cargo_1')->nullable();
            $table->string('firma_2')->nullable();
            $table->string('cargo_2')->nullable();
            $table->string('firma_3')->nullable();
            $table->string('cargo_3')->nullable();

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
        Schema::dropIfExists('Premiacion.informacion');
    }
}
