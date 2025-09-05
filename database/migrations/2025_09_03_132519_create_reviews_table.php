<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // $table->string('name'); Прикрепление к product id

            $table->string('name');
            $table->text('description');


//            $table->bigInteger('user_id')->unsigned();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->foreignId('user_id')->constrained('users');

            $table->timestamp('published_at')->nullable();
            $table->boolean('active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
