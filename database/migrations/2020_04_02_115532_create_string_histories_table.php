<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStringHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('string_histories', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('gear_id');
            $table->date('change_date')->nullable();
            $table->integer('seq')->unsigned();
            $table->string('brand')->nullable();
            $table->integer('gauge_1')->unsigned();
            $table->integer('gauge_2')->unsigned()->nullable();
            $table->integer('gauge_3')->unsigned()->nullable();
            $table->integer('gauge_4')->unsigned()->nullable();
            $table->integer('gauge_5')->unsigned()->nullable();
            $table->integer('gauge_6')->unsigned()->nullable();
            $table->integer('gauge_7')->unsigned()->nullable();
            $table->integer('gauge_8')->unsigned()->nullable();
            $table->integer('gauge_9')->unsigned()->nullable();
            $table->integer('gauge_10')->unsigned()->nullable();
            $table->integer('gauge_11')->unsigned()->nullable();
            $table->integer('gauge_12')->unsigned()->nullable();
            $table->string('comment')->nullable();
            $table->boolean('is_unknown')->nullable();

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
        Schema::dropIfExists('string_histories');
    }
}
