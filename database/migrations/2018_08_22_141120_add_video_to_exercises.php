<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoToExercises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercises', function($table)
        {
            $table->string('first_image');
            $table->string('second_image');
            $table->string('video_link');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercises', function($table)
        {
            $table->dropColumn('first_image');
            $table->dropColumn('second_image');
            $table->dropColumn('video_link');

        });
    }
}
