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
            $table->integer('seq')->unsigned()->default(1);
            $table->string('brand')->nullable();
            $table->string('gauge_1');
            $table->string('gauge_2')->nullable();
            $table->string('gauge_3')->nullable();
            $table->string('gauge_4')->nullable();
            $table->string('gauge_5')->nullable();
            $table->string('gauge_6')->nullable();
            $table->string('gauge_7')->nullable();
            $table->string('gauge_8')->nullable();
            $table->string('gauge_9')->nullable();
            $table->string('gauge_10')->nullable();
            $table->string('gauge_11')->nullable();
            $table->string('gauge_12')->nullable();
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
