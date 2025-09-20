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
        Schema::table('offers', function (Blueprint $table) {
            $table->boolean('active')->default(false)->after('id');
            $table->integer('quantity')->default(0)->unsigned();
            $table->decimal('price', 11)->default(0)->unsigned();
            $table->decimal('price_discount', 11)->default(0)->unsigned();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('quantity');
            $table->dropColumn('price');
            $table->dropColumn('price_discount');
            $table->dropColumn('image');
        });
    }
};
