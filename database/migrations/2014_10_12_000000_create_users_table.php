<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                ->nullable()
                ->min(1)
                ->max(30);
            $table->string('surname')
                ->nullable()
                ->min(1)
                ->max(50);
            $table->string('account_name')
                ->unique()
                ->min(3)
                ->max(30);
            $table->string('email')
                ->unique();
            $table->timestamp('email_verified_at')
                ->nullable();
            $table->string('password');
            $table->foreignId('role_id');
            $table->boolean('is_active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
