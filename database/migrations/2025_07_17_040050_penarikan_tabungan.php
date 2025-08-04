<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penarikan_tabungan', function (Blueprint $table) {
            $table->id();
            $table->char('nis', 10);
            $table->date('tanggal');
            $table->integer('total');

            $table->foreign('nis')->references('nis')->on('santri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penarikan_tabungan');
    }
};
