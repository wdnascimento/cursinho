<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique();
            $table->string('cpf',14);
            $table->string('social_name');

            $table->string('rg',15);
            $table->integer('marital_status')->comment('tb_codes - 2');

            $table->integer('nationality')->comment('tb_codes - 3');
            $table->integer('color')->comment('tb_codes - 4');
            $table->date('birthdate');

            $table->text('birthcity');
            $table->text('birthstate');
            $table->text('housephone');

            $table->text('officephone')->nullable(true);
            $table->text('cellphone');
            $table->text('messagephone')->nullable(true);

            $table->integer('sex')->comment('tb_codes - 5');
            // Adress
            $table->string('cep',10);
            $table->string('logradouro')->comment('address');
            $table->string('bairro')->comment('neighborhood');
            $table->string('numero')->comment('number');
            $table->string('localidade')->comment('city');
            $table->string('uf')->comment('state');
            $table->string('complemento')->nullable(true)->comment('complement');

            // father, mother, worker, time_work, saturday_work, saturday_time, place_study
            // specialneed, descriptionneed, quota
            $table->string('father');
            $table->string('mother');
            $table->integer('worker')->comment('tb_codes - 1 - FLAG');
            $table->integer('time_work')->nullable(true)->comment('tb_codes - 6');
            $table->integer('saturday_work')->comment('tb_codes - 1 - FLAG');
            $table->integer('saturday_time')->nullable(true)->comment('tb_codes - 6');
            $table->integer('place_study')->comment('tb_codes - 7');
            $table->integer('specialneed')->comment('tb_codes - 1 - FLAG');
            $table->string('descriptionneed')->nullable(true);
            $table->string('quota');

            $table->integer('registrationstep')->nullable(false)->default(1);
            // EXAMPLES
            // $table->text('connection');
            // $table->longText('exception');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();



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
        Schema::dropIfExists('students');
    }
}
