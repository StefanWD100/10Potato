<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user');
            $table->integer('points')->default(0);
            $table->string('path');
            $table->string('filename');
            $table->timestamps();
            $table->foreignId('userid');
            $table->foreign('userid')->
                    references('id')->on('users')->onDelete('cascade'); 

           


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
        
    }
}
