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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text(column: 'isi_berita');
            $table->integer('penulis_id');
            $table->integer('kategori_id');
            $table->integer('tag_id')->nullable();
            $table->string('slug');
            $table->enum('headline', ['Y', 'N'])->default('N');
            $table->enum('publik', ['Y', 'N'])->default('N');
            $table->string('gambar');
            $table->integer('hit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
