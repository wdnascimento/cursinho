<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnsalamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensalaments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selective_process_id');

            $table->string('title',150);
            $table->text('url');
            $table->foreign('selective_process_id')->references('id')->on('selective_processes');

            $table->unique(['title', 'selective_process_id'])->name('title_selective_process_unique');

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
        Schema::dropIfExists('ensalaments');
    }
}
