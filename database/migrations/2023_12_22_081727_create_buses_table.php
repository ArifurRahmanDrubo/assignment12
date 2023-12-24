<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number')->unique();
            $table->integer('seats');
            $table->timestamps();
        });

        Schema::table('buses', function (Blueprint $table) {
            $table->index('number');
        });
    }

    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
