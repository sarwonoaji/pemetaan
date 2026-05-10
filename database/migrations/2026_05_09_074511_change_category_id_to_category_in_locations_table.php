<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('locations', function (Blueprint $table) {

            // hapus foreign key
            $table->dropForeign(['category_id']);

            // hapus column
            $table->dropColumn('category_id');

            // tambah column baru
            $table->string('category')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {

            // hapus category
            $table->dropColumn('category');

            // kembalikan category_id
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

        });
    }
};