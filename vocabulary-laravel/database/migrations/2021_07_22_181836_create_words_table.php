<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('chinese_character', 255) -> nullable();
            $table->string('hiragana', 255) -> nullable();
            $table->string('korean', 255) -> nullable();
            $table->boolean('important') -> default(false);

            $table  -> foreignId('user_id')
                    -> constrained()
                    -> onDelete('cascade');

            $table  -> foreignId('vocabulary_id')
                    -> constrained()
                    -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
