<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creditcards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userId');
            $table->string('accNum')->unique();
            $table->string('cardNumber')->unique();
            $table->string('date');
            $table->string('cve');
            $table->string('holderName');
            $table->string('balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('cards');
    }
}
