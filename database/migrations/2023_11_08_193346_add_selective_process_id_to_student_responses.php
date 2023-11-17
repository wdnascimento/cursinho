<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelectiveProcessIdToStudentResponses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_responses', function (Blueprint $table) {
            // $table->unsignedBigInteger('selective_process_id')->default(1)->after('response_id');
            // $table->foreign('selective_process_id')->references('id')->on('selective_processes');
            // $table->dropUnique(['student_id', 'response_id']);
            // $table->unique(['student_id', 'response_id','selective_process_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_responses', function (Blueprint $table) {
            $table->dropUnique(['student_id', 'response_id','selective_process_id']);
            $table->dropForeign(['selective_process_id']);
            $table->dropColumn('selective_process_id');
        });
    }
}
