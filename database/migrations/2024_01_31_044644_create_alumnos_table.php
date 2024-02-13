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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 10)->unique;
            $table->string('nombre', 120);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20);
            $table->string('email', 50)->nullable();
            $table->unsignedBigInteger('nivel_id');
            $table->timestamps();

            $table->foreign('nivel_id')->references('id')->on('niveles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
