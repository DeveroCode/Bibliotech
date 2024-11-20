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
        Schema::table('registroentradas', function (Blueprint $table) {
            //
            $table->foreignId('actividades_id')->constrained()->onDelete('cascade');       
            $table->foreignId('categorias_id')->constrained()->onDelete('cascade');   
            
         });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registroentradas', function (Blueprint $table) {
            //
        });
    }
};
