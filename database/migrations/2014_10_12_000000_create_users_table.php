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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('category_id')->constrained()->cascadeOnDelete()->nullable();
            $table->unsignedBigInteger('role_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('otp')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('workplace')->nullable();
            $table->string('state')->nullable();
            $table->string('gender')->nullable();
            $table->string('expertise')->nullable();
            $table->string('yrs_of_exp')->nullable();
            $table->string('photo')->nullable();
            $table->char('status', 1)->default('0');
            $table->string('password');
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
