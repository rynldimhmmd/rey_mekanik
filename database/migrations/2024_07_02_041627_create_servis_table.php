<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('servis', function (Blueprint $table) {
            $table->id('id_servis');
            $table->unsignedBigInteger('id_mekanik');
            $table->foreign('id_mekanik')->references('id_mekanik')->on('mekaniks')->ondelete('cascade')->onupdate('cascade');
            $table->string('jenis_servis');
            $table->date('tanggal_servis');
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('servis');
    }
};

