<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Diner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('remember_token')->nullable();
            $table->nullableTimestamps();
            $table->string('social_id')->unique();
            $table->string('name');
            $table->string('avatar');
            $table->string('social_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('Diner');
    }
}
