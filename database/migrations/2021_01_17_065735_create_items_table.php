<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->string('name');
            $table->text('description');
            $table->string('sprite');
            $table->enum('item_type', [
                'Skin',
                'Weapon',
                'Enemy',
                'Boss',
            ]);
            $table->float('start_property_value');
            $table->integer('max_level');
            $table->float('grow_value');
            $table->enum('effect', [
                'Fire',
                'Ice',
                'Poison',
                'Curse',
                'Shit',
            ]);
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
        Schema::dropIfExists('items');
    }
}
