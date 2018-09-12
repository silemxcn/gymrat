<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsExerciseTable extends Migration
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
            $table->string('type');
            $table->string('muscle_group');
            $table->float('rating');
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
            $table->dropColumn('type');
            $table->dropColumn('muscle_group');
            $table->dropColumn('rating');
        });
    }
}
