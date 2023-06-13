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
        //relacion de muchos a muchos muchos usuarios pude seguir muchos otros usuarios
        //tambien conocido como tabla pivote
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            //usuario
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //usuario al que esta siguiendo, como es de la misma tabla que 
            //toma el id se especifica la tabla en el constrained
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
