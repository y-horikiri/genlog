<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStringHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('string_histories', function (Blueprint $table) {
            $table->dropColumn('seq');
            $table->dropColumn('is_unknown');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('string_histories', function (Blueprint $table) {
            $table->integer('seq')->unsigned()->default(1);
            $table->boolean('is_unknown')->nullable();
        });

    }
}
