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
        Schema::dropIfExists('form_orders');
        Schema::create('form_orders', function (Blueprint $table) {
            $table->id();
            $table->string('vet_name');
            $table->string('odbh');
            $table->string('obshtina');
            $table->string('vet_mobile');
            $table->string('email');
//            1
            $table->integer('broi');
            $table->string('animal');
            $table->string('no');
            $table->string('client_names');
            $table->string('egn');
            $table->string('client_mobile');
            $table->longText('ekont');
            $table->longText('invoice');
            //2
            $table->integer('broi1');
            $table->string('animal1');
            $table->string('no1');
            $table->string('client_names1');
            $table->string('egn1');
            $table->string('client_mobile1');
            $table->longText('ekont1');
            $table->longText('invoice1');
            //3
            $table->integer('broi2');
            $table->string('animal2');
            $table->string('no2');
            $table->string('client_names2');
            $table->string('egn2');
            $table->string('client_mobile2');
            $table->longText('ekont2');
            $table->longText('invoice2');
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
        Schema::dropIfExists('form_orders');
    }
};
