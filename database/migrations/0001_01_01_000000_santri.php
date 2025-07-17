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
        Schema::create('santri', function (Blueprint $table) {
            $table->char('nis', 8)->primary();
            $table->string('nama', 50);
            $table->enum('kelas', ['TKA', 'TQA']);
            $table->string('password', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};
