<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sayfas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //sayfa_basligi , sayfa_icerik , sayfa_aciklamasi , sayfa_anahtar_kelimeler,sayfa_tipi,sayfa_durumu
        Schema::create('sayfas', function (Blueprint $table) {
            $table->id();
            $table->string('sayfa_basligi');
            $table->string('sayfa_icerik');
            $table->string('sayfa_aciklamasi');
            $table->string('sayfa_anahtar_kelimeler');
            $table->string('sayfa_tipi');
            $table->string('sayfa_durumu');
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
        Schema::drop('sayfas');
    }
}
