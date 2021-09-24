<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string("key")->unique();
        });

        Schema::create('dictionary_terms', function (Blueprint $table) {
            $table->id();
            $table->string("value")->unique();
            $table->foreignId("dictionary_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionary');
        Schema::dropIfExists('dictionary_term');
    }
}
