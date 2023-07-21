<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_heads_rows', function (Blueprint $table) {
            $table->id();
            $table->string('num_from');
            $table->string('num_to');
            $table->string('quantity');
            $table->date('date');
            $table->unsignedBigInteger('letter_head_id');
            $table->unsignedBigInteger('farm_id');

            $table->foreign('letter_head_id')
                ->references('id')
                ->on('letter_heads')
                ->onDelete('cascade');

            $table->foreign('farm_id')
                ->references('id')
                ->on('animal_farms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('letter_heads_rows');
    }
};
