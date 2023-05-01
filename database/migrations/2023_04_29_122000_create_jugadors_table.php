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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("kills");
            $table->boolean("vivo");
            $table->string("asesinadopor")->nullable();
            $table->unsignedBigInteger("equipo_id");
            $table->foreign("equipo_id")->references("id")->on("equipos");
            $table->unsignedBigInteger("guerra_id");
            $table->foreign("guerra_id")->references("id")->on("guerras");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadors');
    }
};
