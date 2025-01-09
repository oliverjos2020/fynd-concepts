<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();

        // Define foreign key for user_id
        $table->foreignId('user_id')
              ->constrained('users')
              ->onDelete('cascade')
              ->index();

        // Define foreign key for artisan_id with a custom constraint name
        $table->unsignedBigInteger('artisan_id');
        $table->foreign('artisan_id', 'reviews_artisan_id_foreign') // Explicit constraint name
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

        $table->decimal('rating', 2, 1)->nullable(); // Allow up to 1 decimal place (e.g., 4.5)
        $table->text('review')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
