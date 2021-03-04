<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorios', function (Blueprint $table) {
            $table->foreignId('ramo_general')->constrained("cat_ramos");
            $table->foreignId('unidad')->constrained('cat_unidades');
            $table->foreignId('titulo_grado')->constrained('cat_titulos');
            $table->string('nombre')->unique();
            $table->text('cargo');
            $table->string('email')->unique();
            $table->text('direccion');
            $table->foreignId('id')->constrained('cat_titulos');
            $table->text('tema_especifico');
            $table->unsignedBigInteger('phone_local');
            $table->unsignedBigInteger('phone_ext')->nullable();
            $table->unsignedBigInteger('movile_phone')->nullable();
            $table->foreignId('id')->constrained('users');
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorios');
    }
}
