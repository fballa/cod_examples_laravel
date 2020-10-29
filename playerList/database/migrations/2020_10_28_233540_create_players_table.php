<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->integer('id')->unsigned();
            $table->string('name',50);
            $table->string('surename',50);
            $table->string('email',100);
            $table->string('team',50)->nullable();
            $table->string('cell_phone',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('coments',500)->nullable();
            $table->integer('age');
            $table->boolean('activo')->nullable();
            $table->string('position',50)->nullable();

            $table->timestamps();
            $table->primary(array('id', 'email'));

        });

        DB::statement('ALTER TABLE players MODIFY id INTEGER NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
