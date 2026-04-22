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
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("guerra_id");
            $table->foreign("guerra_id")->references("id")->on("guerras");
            $table->string("asesino")->nullable();
            $table->string("muerto");
            $table->string("tipo")->default("asesinato");
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividads');
    }
};
