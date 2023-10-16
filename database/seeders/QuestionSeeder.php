<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'text', 'type', 'required', 'order';
        $table = new Question();
        $i=1;
        $table->create(['text' => 'Qual o local de sua residência?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Qual a situação das sua residência?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Qual o nível de instrução da sua mãe?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Qual o nível de instrução do seu pai?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Qual a principal ocupação (profissão / carreira) de sua mãe?','type' => '1','required' => '1','order' => $i]); $i++;

        $table->create(['text' => 'Qual a principal ocupação (profissão / carreira) de seu pai?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Qual a faixa de renda da sua família ( em reais )','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Quais membros da sua família participam ativamente da renda da casa ( pergunta obrigatória, citar pelo menos 1 membro ):','type' => '2','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Durante o cursinho você terá que trabalhar?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'A sua família possui automóvel ou moto?','type' => '3','required' => '1','order' => $i]); $i++;

        $table->create(['text' => 'Você possui pessoas com doenças graves ou crônicas na sua família','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Você possui plano de saúde?','type' => '3','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Sua família possui mais imóveis além da moradia','type' => '3','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'De onde você acessa Internet','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Quanto tempo fica conectado por dia','type' => '1','required' => '1','order' => $i]); $i++;

        $table->create(['text' => 'Qual a finalidade que do seu acesso a Internet:','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Onde você estudou durante o Ensino Fundamental?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Onde você estudou durante o Ensino Médio?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Em que ano você concluiu ou concluirá o Ensino Médio','type' => '4','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Em qual colégio você concluiu ou concluirá o Ensino Médio?','type' => '4','required' => '1','order' => $i]); $i++;

        $table->create(['text' => 'Caso você tenha concluído o Ensino Médio, que tipo de curso foi feito:','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Caso você tenha concluído o Ensino Médio, em que turno ele foi feito:','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Você já fez algum vestibular na vida?','type' => '3','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Você já iniciou algum curso superior?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Você já participou do processo seletivo do Cursinho Solidário?','type' => '3','required' => '1','order' => $i]); $i++;

        $table->create(['text' => 'Qual o principal motivo que o levou a inscrever-se no Processo Seletivo do Cursinho Solidário?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Quem ou o que mais o influenciou na escolha do Cursinho Solidário?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Qual a sua maior expectativa em relação ao Cursinho Solidário?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Como você conheceu o Cursinho Solidário?','type' => '1','required' => '1','order' => $i]); $i++;
        $table->create(['text' => 'Que curso pretende prestar no vestibular?','type' => '2','required' => '1','order' => $i]); $i++;

    }
}
