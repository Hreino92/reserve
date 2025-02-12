<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transport_services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del servicio
            $table->text('description')->nullable(); // Descripción del servicio
            $table->string('image')->nullable(); // URL de la imagen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transport_services');
    }
};
