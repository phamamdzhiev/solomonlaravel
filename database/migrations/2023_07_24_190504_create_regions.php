<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        $regionsArray = [
            'Благоевград',
            'Бургас',
            'Варна',
            'Велико Търново',
            'Видин',
            'Враца',
            'Габрово',
            'Добрич',
            'Кърджали',
            'Кюстендил',
            'Ловеч',
            'Монтана',
            'Пазарджик',
            'Перник',
            'Плевен',
            'Пловдив',
            'Разград',
            'Русе',
            'Силистра',
            'Сливен',
            'Смолян',
            'София (столица)',
            'София област',
            'Стара Загора',
            'Търговище',
            'Хасково',
            'Шумен',
            'Ямбол',
        ];

        foreach ($regionsArray as $regionName) {
            DB::table('regions')->insert(['name' => $regionName]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
};
