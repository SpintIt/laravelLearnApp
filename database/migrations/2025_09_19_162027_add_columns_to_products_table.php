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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('active')->default(false)->after('id');
            $table->string('code', 100)->after('name');
            $table->integer('sort')->nullable()->default(100)->unsigned()->after('code');
            $table->string('image')->nullable()->after('sort');
            $table->string('description', 5000)->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('code');
            $table->dropColumn('sort');
            $table->dropColumn('image');
            $table->dropColumn('description');
        });
    }
};
