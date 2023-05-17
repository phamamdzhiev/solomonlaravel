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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('animal');
        });

        $data = [
            ['animal' => 'ЕПЖ'],
            ['animal' => 'ДПЖ'],
            ['animal' => 'ДПЖ (за клане)'],
            ['animal' => 'СВ групови/зелени/'],
            ['animal' => 'СВ индивидуални/жълти/'],
            ['animal' => 'Табелки ПЧ'],
            ['animal' => 'Big Boss'],
        ];

        foreach ($data as $item) {
            \Illuminate\Support\Facades\DB::table('animals')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
};
