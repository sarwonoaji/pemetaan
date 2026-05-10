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
        Schema::create('locations', function (Blueprint $table) {

            $table->id();

            $table->string('nama_lokasi');

            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->onDelete('cascade');

            $table->string('foto')->nullable();

            $table->text('jalan')->nullable();

            $table->string('desa')->nullable();

            $table->string('kelurahan')->nullable();

            $table->string('kecamatan')->nullable();

            $table->string('provinsi')->nullable();

            $table->string('latitude')->nullable();

            $table->string('longitude')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};