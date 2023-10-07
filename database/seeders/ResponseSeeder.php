<?php

namespace Database\Seeders;

use App\Models\Response;
use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $table = new Response();
        // id, question_id, text, optvalue, type, created_at, updated_at
        $table->create(['question_id' => 1, 'text' =>'Curitiba' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 1, 'text' =>'Região Metropolitana' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 1, 'text' =>'Outra' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em casa dos pais, quitada ou financiada' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em casa dos pais, alugada' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em casa própria, quitada ou financiada' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em casa alugada, paga por você' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em república, casa de estudante, pensão ou pensionato' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em casa de parentes ou amigos' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 2, 'text' =>'Mora em casa alugada para você, paga por seus pais' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Superior completo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Superior incompleto' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Ensino médio completo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Ensino médio incompleto' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Ensino fundamental completo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Ensino fundamental incompleto' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Sem escolaridade (não estudou)' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 3, 'text' =>'Não sei informar' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Superior completo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Superior incompleto' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Ensino médio completo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Ensino médio incompleto' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Ensino fundamental completo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Ensino fundamental incompleto' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Sem escolaridade (não estudou)' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 4, 'text' =>'Não sei informar' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Funcionário público Federal, Estadual ou Municipal' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Empregado de empresa comercial, industrial, bancária ou agrícola' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Sócio ou dono de empresa comercial, industrial, bancária ou agrícola' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Trabalho remunerado por conta própria, auxiliado por parentes/familiares' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Trabalho remunerado por conta própria, com empregados' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Trabalha em casa e/ou não tem atividade remunerada' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 5, 'text' =>'Não Trabalha' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Funcionário público Federal, Estadual ou Municipal' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Empregado de empresa comercial, industrial, bancária ou agrícola' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Sócio ou dono de empresa comercial, industrial, bancária ou agrícola' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Trabalho remunerado por conta própria, auxiliado por parentes/familiares' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Trabalho remunerado por conta própria, com empregados' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Trabalha em casa e/ou não tem atividade remunerada' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 6, 'text' =>'Não Trabalha' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 7, 'text' =>'Até R$ 915,00' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 7, 'text' =>'De R$ 915,00 a R$ 1220,00' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 7, 'text' =>'De R$ 1220,00 a R$ 1.830,00' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 7, 'text' =>'De R$ 1.831,00 a R$ 2.440,00' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 7, 'text' =>'Acima de R$ 2.440,00' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 7, 'text' =>'Outra Faixa de Renda' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);

        $table->create(['question_id' => 8, 'text' =>'Nome (Membro 1)' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Idade (Membro 1)' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Parentesco (Membro 1)' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Contribuição (R$) (Membro 1)' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);

        $table->create(['question_id' => 8, 'text' =>'Nome (Membro 2)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Idade (Membro 2)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Parentesco (Membro 2)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Contribuição (R$) (Membro 2)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);

        $table->create(['question_id' => 8, 'text' =>'Nome (Membro 3)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Idade (Membro 3)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Parentesco (Membro 3)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);
        $table->create(['question_id' => 8, 'text' =>'Contribuição (R$) (Membro 3)' , 'type' => 2,'required' => 0 , 'value' => 0 ]);

        $table->create(['question_id' => 9, 'text' =>'Sim, em tempo integral ( 8 horas )' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 9, 'text' =>'Sim, em tempo parcial ( 4 horas ) - Manhã' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 9, 'text' =>'Sim, em tempo parcial ( 4 horas ) - tarde' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 9, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 10, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 10, 'text' =>'Sim , qual marca e modelo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 11, 'text' =>'Sim' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 11, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 12, 'text' =>'Sim, qual o valor mensal' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 12, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 13, 'text' =>'Sim, qual a quantidade' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 13, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 14, 'text' =>'Da sua residência' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 14, 'text' =>'Banda larga' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 14, 'text' =>'Discado' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 14, 'text' =>'Do trabalho' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 14, 'text' =>'Escola' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 14, 'text' =>'Lan House' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 15, 'text' =>'Menos de uma hora' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 15, 'text' =>'Entre uma e duas horas' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 15, 'text' =>'Mais de duas horas' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 15, 'text' =>'Não tenho acesso diário a Internet ( informar quanto tempo acessa por semana)' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 16, 'text' =>'Trabalho' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 16, 'text' =>'Entreterimento' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 16, 'text' =>'Educação' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 16, 'text' =>'Redes Sociais' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 17, 'text' =>'Todos em escola pública' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 17, 'text' =>'Todos em escola particular' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 17, 'text' =>'Maior parte em escola pública' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 17, 'text' =>'Maior parte em escola particular' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 17, 'text' =>'Em escolas comunitárias/CNEC ou outra do gênero' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 18, 'text' =>'Todos em escola pública' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 18, 'text' =>'Todos em escola particular' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 18, 'text' =>'Maior parte em escola pública' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 18, 'text' =>'Maior parte em escola particular' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 18, 'text' =>'Em escolas comunitárias/CNEC ou outra do gênero' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);

        $table->create(['question_id' => 19, 'text' =>'Ano' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 18, 'text' =>'Colégio' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);


        $table->create(['question_id' => 21, 'text' =>'Ensino Médio Regular ou Comum ( Colegial )' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 21, 'text' =>'Ensino Médio de Nível Técnico' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 21, 'text' =>'Ensino Médio de Nível Profissionalizante' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 21, 'text' =>'Curso de Magistério' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 21, 'text' =>'Outro tipo alternativo de Ensino Médio' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 22, 'text' =>'Diurno' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 22, 'text' =>'Noturno' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 22, 'text' =>'Maior parte diurno' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 22, 'text' =>'Maior parte noturno' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 23, 'text' =>'Sim' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 23, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 24, 'text' =>'Sim, mas não concluí' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 24, 'text' =>'Sim, mas já concluí' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 24, 'text' =>'Sim, estou cursando' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 24, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 25, 'text' =>'Sim' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 25, 'text' =>'Não' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 26, 'text' =>'Por se tratar de curso acessível' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 26, 'text' =>'Pela qualidade do ensino' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 26, 'text' =>'Pela localização' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 26, 'text' =>'Outro motivo' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 27, 'text' =>'A família' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 27, 'text' =>'Colegas e amigos' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 27, 'text' =>'Professor ou escola' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 27, 'text' =>'Imprensa' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 27, 'text' =>'Outros' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação no vestibular da UFPR' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação no vestibular do UTFPR' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação na IFPR (Instituto Federal do Paraná)' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação nos vestibulares particulares (PROUNI)' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação na UEM' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação na UEL' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 28, 'text' =>'Aprovação na USP' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'TV' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Rádio' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Cartaz' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Jornal' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'No colégio/cursinho' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Internet' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Amigos' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Internet / Rede Social' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Wattsapp' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 29, 'text' =>'Outros' , 'type' => 1, 'required' => 1  , 'value' => 0 ]);

        $table->create(['question_id' => 30, 'text' =>'Da UFPR' , 'type' => 2, 'required' => 1  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'Da UTFPR' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'Da IFPR' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'Particulares (PROUNI)' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'SISU' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'UEM' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'UEL' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
        $table->create(['question_id' => 30, 'text' =>'USP' , 'type' => 2, 'required' => 0  , 'value' => 0 ]);
    }
}
