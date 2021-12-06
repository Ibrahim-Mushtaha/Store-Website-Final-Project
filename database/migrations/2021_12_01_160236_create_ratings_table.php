<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{

    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')-> references('id')-> on('stores')->onDelete('cascade');
            $table->double('rate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }

}
