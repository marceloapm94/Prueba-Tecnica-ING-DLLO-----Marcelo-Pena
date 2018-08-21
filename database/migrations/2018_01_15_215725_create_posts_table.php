<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto');
            $table->string('precio');
            $table->string('cliente');
            $table->string('correo');
            $table->string('metodopago');
            $table->string('imagen');
            $table->string('moneda');
            $table->text('comentario');
            $table->string('estado');
            $table->integer('user_id')->unsigne();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
