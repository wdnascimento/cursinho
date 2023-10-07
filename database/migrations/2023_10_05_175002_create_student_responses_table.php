<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('response_id');
            $table->text('textvalue')->nullable(true);
            $table->integer('optvalue')->nullable(true);

            // Chaves estrangeiras
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('response_id')->references('id')->on('responses');

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
        Schema::dropIfExists('student_responses');
    }
}
