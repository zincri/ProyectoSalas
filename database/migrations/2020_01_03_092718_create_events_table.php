<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nombre');
            $table->String('descripcion');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->boolean('proyector');
            $table->string('estado');
            $table->boolean('activo');

            $table->timestamps();
        });
        Schema::table('events', function ($table) {
           
        $table->bigInteger('sala_id')->unsigned();
        $table->foreign('sala_id')->references('id')->on('salas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
