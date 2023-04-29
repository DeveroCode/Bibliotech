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
        Schema::table('libros', function (Blueprint $table) {
            //
            $table->string('titulo');
            $table->string('edicion');
            $table->string('tomo')->nullable();
            $table->string('paginas');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->string('isbn')->unique();
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            //
            $table->dropForeign('libros_categoria_id_foreign');
            $table->dropForeign('libros_user_id_foreign');
            // $table->dropForeign('libros_autor_id_foreign');
            $table->dropColumn(['titulo', 'edicion', 'tomo', 'categoria_id', 'fecha', 'cantidad', 'isbn', 'descripcion', 'imagen']);
        });
    }
};
