<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSelectiveProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_selective_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('selective_process_id');
            $table->string('payment',255)->nullable(true);
            $table->string('agreeterms',255)->nullable(true);
            $table->datetime('date');

            // Chaves estrangeiras
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('selective_process_id')->references('id')->on('selective_processes');

            $table->unique(['student_id', 'selective_process_id'])->name('student_selective_process_unique');

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
        Schema::dropIfExists('student_selective_processes');
    }
}
