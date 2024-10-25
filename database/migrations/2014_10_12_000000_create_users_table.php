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
            $table->string('business_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('category_id')->constrained()->cascadeOnDelete()->nullable();
            $table->unsignedBigInteger('role_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('otp')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('work_phone_no')->nullable();
            $table->string('lga_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('subservice_id')->nullable();
            $table->string('yrs_of_expertise')->nullable();
            $table->string('work_address')->nullable();
            $table->text('bio')->nullable();
            $table->string('passport')->nullable();
            $table->string('id_doc')->nullable();
            $table->char('status', 1)->default('0');
            $table->char('is_profile_complete', 1)->default('0');
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
