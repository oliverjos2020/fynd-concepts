<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
        $this->insertDefaultData();

    }

      private function insertDefaultData()
    {
        $data = [
            ['role' => 'Admin', 'slug' => Str::of(Str::lower('Admin'))->slug('-')],
            ['role' => 'Artisan', 'slug' => Str::of(Str::lower('Artisan'))->slug('-')],
            ['role' => 'User', 'slug' => Str::of(Str::lower('User'))->slug('-')],
            // Add more default data as needed
        ];

        DB::table('roles')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
