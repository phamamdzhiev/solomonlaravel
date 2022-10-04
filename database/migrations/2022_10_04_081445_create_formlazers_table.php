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
        Schema::create('formlazers', function (Blueprint $table) {
            $table->id();
            $table->string('odbh');
            $table->string('obshtina');
            $table->string('no');
            $table->string('city');
            $table->string('names');
            $table->string('vet');
            $table->string('vet_tel');
            $table->string('mail');
            $table->string('egn');
            $table->longText('ekont');
            $table->longText('invoice');
            $table->string('client_mobile');
            $table->json('field1');
            $table->json('field2');
            $table->json('field3');
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
        Schema::dropIfExists('formlazers');
    }
};
