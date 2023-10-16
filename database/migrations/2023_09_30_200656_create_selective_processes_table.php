<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectiveProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selective_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('title');
            $table->date('startdate');
            $table->date('enddate');
            $table->text('extramessage');
            $table->string('instructionurl');
            $table->string('terms');
            $table->decimal('taxvalue',10,2);
            $table->date('paymentfinaldate');

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
        Schema::dropIfExists('selective_processes');
    }
}
