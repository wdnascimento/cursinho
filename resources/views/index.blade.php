<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icon/apple-touch-icon.png'); }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png'); }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png'); }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest'); }}">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('home/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('home/assets/css/style.css') }}" rel="stylesheet">


</head>
<body>
    <main >
        <body>

            <!-- ======= Header ======= -->
            <header id="header" class="fixed-top">
              <div class="container d-flex align-items-center">

                <h1 class="logo me-auto">
                  <a href="{{ asset(''); }}">
                    <img src="{{ asset('home/assets/img/logo_horizontal.png'); }}" alt="" srcset="">
                  </a>
                </h1>
                @if(isset($data['selective_processes']) && ($data['selective_processes'] !== NULL))
                <a href="{{ asset('login'); }}" class="get-started-btn">INSCREVA-SE</a>
                @else
                <a href="{{ asset('ensalamento'); }}" class="get-started-btn">RESULTADOS</a>
                @endif
               </div>
            </header><!-- End Header -->

            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex justify-content-center align-items-center">
              <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <img class="seliga" src="{{ asset('home/assets/img/seliga.png'); }}" width="80%" height="auto">
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 text-center text-white">
                    <h4 class="w-100 pt-3">CURSO PRÉ-VESTIBULAR</h4>
                    <img src="{{ asset('home/assets/img/Logo Cursinho Solidario Vert.png'); }}"  width="80%" height="auto" >
                    <h5 class="w-100 pt-3 text-right">NÃO DEIXE O CUSTO</h5>
                    <h5 class="w-100 text-right">DO APRENDIZADO</h5>
                    <h5 class="w-100 text-right">IMPEDIR</h5>
                    <img src="{{ asset('home/assets/img/Seus sohos.png'); }}"  width="80%" height="auto" >
                    <h5 class="w-100 pt-3" >NO CURSINHO SOLIDÁRIO</h5>
                    <h5 class="w-100">A EDUCAÇÃO É GRATUITA!</h5>

                  </div>
                </div>
              </div>
            </section><!-- End Hero -->

            <main id="main">

              <!-- ======= Cource Details Section ======= -->
              <section id="course-details" class="course-details">
                <div class="container" data-aos="fade-up">

                  <div class="row">
                    <div class="col-12">
                      <img src="{{ asset('home/assets/img/course-details.jpg'); }}" class="w-100 d-flex" alt="">
                      <br>
                      <h5>O Cursinho</h5>
                      <p  style="text-align: justify;">
                        Com o objetivo de dar uma oportunidade para milhares de jovens e adultos, residentes em Curitiba e/ou Região Metropolitana,
                        o Cursinho Solidário oferece vagas para aqueles que estudaram em escolas da rede pública de ensino, os que usufruíram
                        de bolsas integrais em escolas particulares, como também para os que não possuem condições financeiras suficientes para
                         bancar um cursinho particular.
                        <br>
                        Com acesso a um material de boa qualidade somado ao corpo docente capacitado, em uma estrutura semelhante à de
                        qualquer curso preparatório privado, acreditamos que o aluno do Cursinho Solidário tem plenas condições de tornar
                        real o sonho de ingressar na faculdade, além de servir como realização pessoal e/ou coletiva, e garantir a melhoria
                        na sua qualidade de vida futura. Desde o início do projeto contamos com mais de 2500 aprovações em diversas universidades do Brasil.
                        <br>
                        <br>
                        As aulas do Cursinho Solidário acontecem de segunda a sábado no Curso Positivo Vicente Machado. De segunda a sexta as aulas
                         ocorrem no turno da noite, das 18h45 às 22h20, e aos sábados pela parte da tarde, das 13h30 às 18h30.
                      </p>
                    </div>

                  </div>

                </div>
              </section><!-- End Cource Details Section -->

              <!-- ======= Cource Details Tabs Section ======= -->
              <section id="cource-details-tabs" class="cource-details-tabs">
                <div class="container" data-aos="fade-up">

                  <div class="row">
                    <div class="col-lg-3">
                      <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                          <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Processo</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Etapas</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-3">1ª Etapa</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-4">2ª Etapa</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Demais Informações</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                      <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                          <div class="row">
                            <div class="col-lg-12 details order-2 order-lg-1">
                              <p  style="text-align: justify;">
                                O Cursinho Solidário é um curso pré-vestibular que não possui mensalidade.
                                Nosso objetivo é ajudar estudantes de baixa renda a ingressar no Ensino Superior.
                                Para participar é necessário passar por um processo seletivo que consiste em duas etapas:
                                 A primeira é uma prova que engloba conteúdos estudados no Ensino Médio e a segunda etapa,
                                  uma entrevista socioeconômica com o candidato.
                                Os estudantes que têm interesse em participar do processo seletivo precisam ter: estudado
                                 em escola pública ou escola particular com bolsa integral; estar concluindo o
                                 Ensino Médio em 2024 ou já ter finalizado; e a renda da família do candidato
                                 deve ser de até um salário mínimo por pessoa.
                                <br>
                                <br>
                                <strong>Inscrições são realizadas por aqui até o dia 24/01/2023.</strong>
                                <br>
                                <br>
                                <strong>LEIA ATENTAMENTE O EDITAL ANTES DE PREENCHER A SUA INSCRIÇÃO!</strong>
                                <br>
                                Os dados fornecidos não poderão ser alterados após a realização da inscrição.
                                Caso não possua acesso à Internet, você pode realizar a inscrição pessoalmente
                                 na secretaria do Cursinho Solidário, localizado na Avenida Vicente Machado n.° 198, Conjunto 101, Térreo.
                                 O horário de atendimento acontece das 13h30 às 18h30,
                                 não é necessário agendar um horário de atendimento.
                                Após a realização da inscrição é necessário pagar a taxa de inscrição.
                                A taxa de inscrição é de <strong> R$ 65,00 (sessenta e cinco reais) </strong>e deve ser paga
                                até o dia 25/01/2024 (quinta-feira). Sua inscrição será confirmada com o pagamento da taxa.
                                O comprovante de pagamento é a confirmação de sua inscrição, por isso, não o perca!
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                          <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                              <p  style="text-align: justify;">
                                O processo seletivo está dividido em duas fases:
                                <br>
                                <br>
                                <strong>1ª etapa:</strong> uma prova objetiva de 48 questões sobre os conteúdos dos dois primeiros anos do Ensino Médio.
                                <br>
                                <br>
                                <strong>2ª etapa:</strong> entrevista socioeconômica e entrega de documentos comprobatórios.
                                <br>
                                <br>
                                É necessário preencher um cadastro com seus dados pessoais e responder um questionário socioeconômico.
                              </p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="{{ asset('home/assets/img/course-details-tab-2.jpg'); }}" alt="" class="img-fluid">
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                          <div class="row">
                            <div class="col-lg-12 details order-2 order-lg-1">
                              <p  style="text-align: justify;">
                                <h5>1ª etapa</h5>
                                A primeira fase é uma PROVA OBJETIVA, que possui 48 questões sobre os conteúdos dos dois primeiros anos do Ensino Médio.
                                <br><br>
                                <strong>O que é necessário no dia da prova?</strong>
                                <br>
                                <ul>
                                  <li>Documento oficial de identificação com foto;</li>
                                  <li>Comprovante de inscrição;</li>
                                  <li>Caneta esferográfica preta ou azul</li>
                                </ul>
                                <br>
                                <br>
                                <h5>ATENÇÃO</h5>
                                É permitido levar lápis e borracha para realização da prova.
                                Não será permitido realizar a prova sem documento oficial de identificação.

                                <h5>Como é a prova?</h5>
                                <br>
                                <br>
                                Ela é composta de 48 (quarenta e oito) questões objetivas, com 5 (cinco) alternativas de resposta cada,
                                sendo apenas 1 (uma) alternativa correta para cada questão.
                                As questões estão divididas entre as seguintes disciplinas e possuem pesos diferentes:
                                <br>
                                <div class="img-responsive w-100 d-flex justify-content-center">
                                  <img src="{{ asset('home/assets/img/prova.jpg'); }}" class="d-flex w-75"  alt="">
                                </div>
                                <br>
                                Na capa do caderno de questões haverá instruções para o bom andamento da prova, que deverão ser lidas e cumpridas pelos candidatos
                                , bem como deverão ser seguidas as orientações dadas pelos fiscais em sala.
                                <br><br>
                                  A duração máxima para realização da prova será de 3h00 (três horas) incluindo a resolução da prova objetiva
                                  e o preenchimento da folha de respostas. Os candidatos não poderão deixar o local de prova antes de uma
                                  hora após o início da mesma. Não será permitido o ingresso do candidato no local de prova após ás 18h30min.
                                  <br><br>
                                  O gabarito da prova será publicado no site www.cursinhosolidario.org.br no dia 06 DE DEZEMBRO DE 2023.
                                  Até o dia 09/12, na secretaria da Formação Solidária e no site <a href="https://www.cursinhosolidario.org.br">https://www.cursinhosolidario.org.br</a> ,
                                  será publicado o resultado da Primeira Fase do Processo Seletivo.
                                </p>
                              </div>

                          </div>
                        </div>
                        <div class="tab-pane" id="tab-4">
                          <div class="row">
                            <div class="col-lg-12 details order-2 order-lg-1">
                              <p  style="text-align: justify;">
                                <h5>2ª etapa</h5>
                                Nessa fase é necessário comprovar as respostas colocadas no questionário e se o candidato:
                                estudou em escola pública ou em escola particular com bolsa integral; está terminando o
                                Ensino Médio em 2024 ou já concluiu; possui a renda de até um salário mínimo e meio por pessoa da família.
                                O horário e o agendamento das entrevistas serão divulgados no site https://www.cursinhosolidario.org.br.
                                A avaliação socioeconômica terá caráter eliminatório e ocorrerá por ordem classificatória.
                                 As entrevistas serão feitas somente com o candidato, acompanhantes e responsáveis poderão esperar fora do local de avaliação.
                                <br><br>
                                <h5>Quais documentos são necessários?</h5>
                                <br>
                                Para a entrevista o candidato precisa levar CÓPIAS E ORIGINAIS dos seguintes documentos:
                                <br>
                                <ul>
                                  <li>Documento oficial de identificação com foto</li>
                                  <li>Histórico escolar do ensino médio, ou declaração</li>
                                  <li>Declaração de ter estudado com bolsa integral, se for o caso</li>
                                  <li>3 últimas contas de energia</li>
                                  <li>3 últimas contas de água</li>
                                  <li>3 últimas contas telefônicas</li>
                                  <li>3 últimos comprovantes de todas as pessoas da família que compõem a renda</li>
                                  <li>E os documentos que achar necessário</li>
                                </ul>
                                <br><br>
                              É OBRIGATÓRIA ENTREGA DAS FOTOCÓPIAS, que serão conferidas a partir da documentação original apresentada.
                                Além de conhecer o candidato pessoalmente, a entrevista tem por objetivo confirmar e complementar
                                dados informados pelo candidato no ato da inscrição. A conversa irá abordar alguns aspectos,
                                entre eles: histórico familiar, vida acadêmica e expectativas além dos objetivos do candidato em relação ao curso.
                              </p>

                            </div>

                          </div>
                        </div>
                        <div class="tab-pane" id="tab-5">
                          <div class="row">
                            <div class="col-lg-12 details order-2 order-lg-1" >
                              <p  style="text-align: justify;">
                                <h5>Matrículas</h5>

                                  A matrícula só será efetivada mediante o pagamento da taxa de matrícula e assinatura do Termo de Compromisso e Responsabilidade constante no ANEXO III do Edital.
                                  Os CANDIDATOS MENORES deverão ter seu TERMO DE COMPROMISSO E RESPONSABILIDADE assinado pelo respectivo RESPONSÁVEL LEGAL.
                                  A matrícula dará direito ao candidato aprovado de iniciar a participação nas atividades do Cursinho Solidário Extensivo  2024. Os candidatos que não efetivarem a respectiva matrícula no período estipulado perderão o direito à vaga.
                                  É OBRIGATÓRIA a presença do aluno (a) na realização da matrícula, pois é entregue o material didático e tirada a foto para a carteirinha de estudante.
                              </p>
                              <p  style="text-align: justify;">
                                <h5>Esqueceu o login e senha?</h5>
                                    O login e a senha do espaço do candidato é o e-mail e senha que você cadastrou no momento da inscrição.
                                    Se não lembra desses dados, pode clicar em “Esqueci a senha”, o login e senha serão enviados para o e-mail cadastrado.
                              </p>
                              <p  style="text-align: justify;">
                                <h5>O que é o comprovante de inscrição?</h5>
                                O comprovante de inscrição é o comprovante de pagamento da taxa de inscrição.
                              </p>
                              <p  style="text-align: justify;">
                                <h5>O boleto/PIX da taxa de inscrição venceu e você não conseguiu pagar?</h5>
                                Você pode emitir um novo boleto/pix com a data atualizada no espaço do candidato. O boleto/pix fica disponível até o último dia de pagamento.
                              </p>
                              <p  style="text-align: justify;">
                                <h5>Qual será o local da prova?</h5>
                                A prova será realizada NO CURSO POSITIVO VICENTE MACHADO, situada na Avenida Vicente Machado,317 - Centro, Curitiba – Paraná no dia 09 DE DEZEMBRO DE 2024, a partir das 19h00.
                                Os portões serão fechados às 18h30min., não esqueça de levar um documento de identificação com foto, caneta esferográfica preta e seu comprovante de inscrição.
                              </p>
                              <p  style="text-align: justify;">
                                <h5>Quando sairá o ensalamento?</h5>
                                  O ensalamento será divulgado no site www.cursinhosolidario.org.br até o dia 29 DE JANEIRO DE 2024. Ele também estará disponível no espaço do candidato.
                                  Se seu nome não constar na lista do ensalamento, entre em contato com a gente:
                              </p>
                              <p  style="text-align: justify;">
                                <h5>Quando será a entrevista?</h5>
                                  As entrevistas acontecerão na sede do Positivo Vicente Machado, localizada na Av. Vicente Machado, 317 - Centro, Curitiba-PR, entre os dia 13 à 16 de DEZEMBRO DE 2023.
                                  Para a entrevista o candidato precisa levar CÓPIAS E ORIGINAIS dos seguintes documentos:
                                  <br>
                                  <ul>
                                    <li>Documento oficial de identificação com foto</li>
                                    <li>Histórico escolar do ensino médio, ou declaração</li>
                                    <li>Declaração de ter estudado com bolsa integral, se for o caso</li>
                                    <li>3 últimas contas de energia</li>
                                    <li>3 últimas contas de água</li>
                                    <li>3 últimas contas telefônicas</li>
                                    <li>3 últimos comprovantes de todas as pessoas da família que compõem a renda</li>
                                    <li>E os documentos que achar necessário</li>
                                  </ul>
                               </p>
                               <p  style="text-align: justify;">
                                <h5>Não possui todas as contas pedidas para a entrevista. O que fazer?</h5>
                                  Para os candidatos que não possuem as contas originais ou perderam algum dos meses solicitados,
                                  podem levar um histórico de consumo. Esse histórico de consumo pode ser retirado nos sites das empresas de água, luz e telefone.
                                </p>
                                <p  style="text-align: justify;">
                                  <h5>Como é feita a classificação final?</h5>
                                  A classificação final é feita pela junção da média obtida na Prova Objetiva e da Avaliação Socioeconômica.
                                </p>
                                <p  style="text-align: justify;">
                                  <h5>Quais documentos servem como comprovante de renda?</h5>
                                  Para comprovar a renda o candidato pode levar extratos bancários e holerites.
                                  Para aqueles que são autônomos é possível levar uma declaração escrita a próprio punho, informando nome completo,
                                  documento e o valor médio mensal recebido.
                                </p>
                                <p  style="text-align: justify;">
                                  <h5>Como funciona a lista de espera?</h5>
                                    Os candidatos classificados a partir da 541ª (quinquagésima primeira) posição farão parte de LISTA DE ESPERA,
                                    tendo direito ao preenchimento das vagas que surgirem até o dia 30 DE ABRIL DE 2024.
                                    <br><br>
                                    Essa lista será divulgada no site www.cursinhosolidario.org.br. As vagas remanescentes serão
                                    destinadas a lista de espera, a secretaria do Cursinho Solidário irá entrar em contato pelos telefones cadastrados na inscrição.
                                </p>
                                <h4>Tem mais alguma dúvida? Estamos à disposição para te ajudar!</h4>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </section><!-- End Cource Details Tabs Section -->

              <!-- ======= About Section ======= -->
              <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-xs-12 px-2 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                            <img class="img-responsive logo-max"  src="{{ asset('home/assets/img/logo-fundacao-solidaria.png'); }}" >
                        </div>
                        <div class="col-xs-12 px-2 col-sm-6 col-md-4 col-lg-4 ">
                            <h2 class="w-100 text-center text-white py-3">FALE CONOSCO</h2>
                            <p class="w-100 text-center text-white">
                                Instagram: @cursinhosolidario
                                <br>
                                E-mail: contato@formacaosolidaria.org.br
                                <br>
                                WhatsApp: (41) 99887-2098.
                                <br>
                            </p>
                        </div>
                        <div class="col-xs-12 px-2 col-sm-6 col-md-4 col-lg-4 justify-content-center">
                            <h2 class="w-100 text-center text-white py-3">INSCREVA-SE NO PROCESSO SELETIVO</h2>
                            <h2 class="w-100 text-center">
                                @if(isset($data['selective_processes']) && ($data['selective_processes'] !== NULL))
                                <a href="{{ asset('login'); }}" class="get-started-btn">INSCREVA-SE</a>
                                @else
                                <a href="{{ asset('ensalamento'); }}" class="get-started-btn">RESULTADOS</a>
                                @endif
                            </h2>
                        </div>
                    </div>

                </div>
              </section><!-- End About Section -->

            </main><!-- End #main -->

            <!-- ======= Footer ======= -->
            <footer id="footer" class="container-fluid m-0 p-0">

              <div class="footer-top bg-black">
                <div class="container">
                  <div class="text-center">
                    <h5><strong>Apoio:</strong></h5>
                  </div>
                  <div class="row d-flex justify-content-center justify-content-between align-items-center footer-brands">
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/LogoCC.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/sponte.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/nosclen.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/hipergraf.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/rotary.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/gracia.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/gsvioli.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/curso positivo.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/Sistema Positivo.png'); }}" class="d-flex img-responsive">
                    </div>
                  <div>
                  <div class="text-center pt-4">
                      &copy; Copyright <strong><span>All Rights Reserved</span></strong>
                  </div>
                </div>
              </div>
            </footer><!-- End Footer -->


          </body>
    </main>
    <a href="https://api.whatsapp.com/send?phone=5541998872098&amp;text=Olá!%20Esta%20é%20uma%20mensagem%20e%20vinda%20do%20site." class="float-whats" target="_blank" onclick="goog_report_conversion('https://api.whatsapp.com/send?phone=554130952535&amp;text=Olá!%20Esta%20é%20uma%20mensagem%20do%20site.')">
        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI1MTIiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOmNjPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyMiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6aW5rc2NhcGU9Imh0dHA6Ly93d3cuaW5rc2NhcGUub3JnL25hbWVzcGFjZXMvaW5rc2NhcGUiIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgeG1sbnM6c29kaXBvZGk9Imh0dHA6Ly9zb2RpcG9kaS5zb3VyY2Vmb3JnZS5uZXQvRFREL3NvZGlwb2RpLTAuZHRkIiB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcyBpZD0iZGVmczEyIi8+PGcgaWQ9Imc1MTI0Ij48cmVjdCBoZWlnaHQ9IjUxMiIgaWQ9InJlY3QyOTg3IiByeD0iNjQiIHJ5PSI2NCIgc3R5bGU9ImZpbGw6IzY1YmM1NDtmaWxsLW9wYWNpdHk6MTtmaWxsLXJ1bGU6bm9uemVybztzdHJva2U6bm9uZSIgd2lkdGg9IjUxMiIgeD0iMCIgeT0iMCIvPjxwYXRoIGQ9Im0gNDU2LDI1MC44NTI2NiBjIDAsMTA3LjYwOTA0IC04Ny45MTI2LDE5NC44NDQyIC0xOTYuMzYzOTcsMTk0Ljg0NDIgLTM0LjQzMDY2LDAgLTY2Ljc3Njc3LC04LjgwMTY4IC05NC45MTk5LC0yNC4yNDE2MiBMIDU2LjAwMDAwNSw0NTYgOTEuNDM3NzQ1LDM1MS40NTU4NCBDIDczLjU1OTcxNSwzMjIuMDg4NzIgNjMuMjY1MDI1LDI4Ny42NTUyMyA2My4yNjUwMjUsMjUwLjg1MTI0IDYzLjI2NTAyNSwxNDMuMjM1MTYgMTUxLjE4MDQ5LDU2IDI1OS42MzQ2Myw1NiAzNjguMDg3NCw1Ni4wMDEgNDU2LDE0My4yMzY1NyA0NTYsMjUwLjg1MjY2IHogTSAyNTkuNjM2MDMsODcuMDMxOTYgYyAtOTEuMDQwOTIsMCAtMTY1LjA5Mzk2NSw3My40OTI0OCAtMTY1LjA5Mzk2NSwxNjMuODIwNyAwLDM1Ljg0MDU2IDExLjY4MzQ2NSw2OS4wNDE2MiAzMS40NDYwNTUsOTYuMDQ1MjkgbCAtMjAuNjIxNzcsNjAuODMxNTEgNjMuNDQyODUsLTIwLjE2NDAzIGMgMjYuMDcxMjYsMTcuMTEzMjMgNTcuMjkxOTYsMjcuMDk4MDUgOTAuODI1NDMsMjcuMDk4MDUgOTEuMDI5NjUsMCAxNjUuMDkzOTYsLTczLjQ4NTQzIDE2NS4wOTM5NiwtMTYzLjgxMjI0IDAsLTkwLjMyNjggLTc0LjA2MjkyLC0xNjMuODE5MjggLTE2NS4wOTI1NiwtMTYzLjgxOTI4IHogbSA5OS4xNTUyNiwyMDguNjg5NzIgYyAtMS4yMDk4OSwtMS45ODg3OSAtNC40MTg1LC0zLjE4NjAyIC05LjIyNDI0LC01LjU3MDYgLTQuODE3MDUsLTIuMzg3NCAtMjguNDg5NjQsLTEzLjk0NTUxIC0zMi44OTQsLTE1LjUzNDI5IC00LjQxODQ1LC0xLjU5MzAxIC03LjYzMTIyLC0yLjM5MzA0IC0xMC44MzgzOCwyLjM4NDU4IC0zLjIwNDMyLDQuNzkwMjggLTEyLjQyODU2LDE1LjUzNDI5IC0xNS4yNDI3MywxOC43MjAzMSAtMi44MDg1MywzLjE5MTY2IC01LjYwODYzLDMuNTkwMjYgLTEwLjQyNTY5LDEuMjAwMDMgLTQuODA1NzgsLTIuMzg3MzkgLTIwLjMyMTc3LC03LjQyODQgLTM4LjcwODI2LC0yMy43MDIxNSAtMTQuMzA3NDksLTEyLjY1ODE1IC0yMy45Njk3OCwtMjguMjg1NCAtMjYuNzc4MzEsLTMzLjA3MTQ3IC0yLjgwODU0LC00Ljc3OTAzIC0wLjI5NzIsLTcuMzYyMiAyLjEwOTkzLC05LjczOTc1IDIuMTY2MjYsLTIuMTQ3OTYgNC44MTQyMywtNS41ODE4NiA3LjIyNDE2LC04LjM2MzY0IDIuNDA3MTIsLTIuNzk0NDcgMy4yMDcxNSwtNC43ODE4NCA0LjgwODYxLC03Ljk2OTI2IDEuNjEyNzIsLTMuMTg4ODQgMC44MDAwMiwtNS45NzQ4NSAtMC4zOTg2LC04LjM3MDcgLTEuMjAyODYsLTIuMzgzMTcgLTEwLjgzMjc0LC0yNS44ODk1NSAtMTQuODQ0MTUsLTM1LjQ0OSAtNC4wMTEzOCwtOS41NTk0NyAtOC4wMTE1LC03Ljk2NjQ2IC0xMC44MjU2OCwtNy45NjY0NiAtMi44MDk5NiwwIC02LjAxNTY5LC0wLjQwMDAyIC05LjIyOTg3LC0wLjQwMDAyIC0zLjIwOTk3LDAgLTguNDI3MDMsMS4xOTg2NCAtMTIuODM1NjIsNS45NzM0NCAtNC40MTAwMSw0Ljc4MzI1IC0xNi44NDEzOCwxNi4zMzI5MSAtMTYuODQxMzgsMzkuODMzNjUgMCwyMy41MDQ5NyAxNy4yNDI3OSw0Ni4yMTEzMyAxOS42NTI3Myw0OS4zOTU5NCAyLjQwNDMxLDMuMTc3NTYgMzMuMjg4MzgsNTIuOTcyMSA4Mi4yMTgxMSw3Mi4xMDIyOCA0OC45NDgwMiwxOS4xMTMyOCA0OC45NDgwMiwxMi43NDQwNyA1Ny43NzM2NSwxMS45MzcgOC44MTQzNywtMC43ODczNSAyOC40Njk5MiwtMTEuNTQ0MDMgMzIuNDg4MzIsLTIyLjcwMDcyIDQuMDA4NiwtMTEuMTQ5NjQgNC4wMDg2LC0yMC43MTg5NiAyLjgxMTQsLTIyLjcwOTE3IHoiIGlkPSJXaGF0c0FwcF8yXyIgc3R5bGU9ImZpbGw6I2ZmZmZmZjtmaWxsLXJ1bGU6ZXZlbm9kZCIvPjwvZz48cGF0aCBkPSJtIDE4LjY5NTc0LDQ5My4yODc1MSBjIDExLjU2Nzk4LDExLjU2NzkgMjcuNTc2MDYsMTguNzEyNSA0NS4zMDQwNCwxOC43MTI1IGwgMzg0LjAxMjU1LC0wLjAyOSBjIDM1LjQ1NiwwIDYzLjk4NzcsLTI4LjUzMTYgNjMuOTg3NywtNjMuOTg3NTkgbCAwLC0zODMuOTgzNjg1IGMgMCwtMTcuNzI3OTggLTcuMTQ0NiwtMzMuNzM2MDMgLTE4LjcxMjYsLTQ1LjMwNDAzIEwgMTguNjk1NzQsNDkzLjI4NzUxIHoiIGlkPSJyZWN0Mjk4NC0xIiBzdHlsZT0iZmlsbDojMDAwMDAwO2ZpbGwtb3BhY2l0eTowLjMwMTk2MDc4O2ZpbGwtcnVsZTpub256ZXJvO3N0cm9rZTpub25lIi8+PC9zdmc+" alt="" width="45px">
    </a>
    <style>
        .float-whats {
            left: 25px;
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 25px;
            text-align: center;
            z-index: 100;
        }
    </style>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('home/assets/vendor/aos/aos.js'); }}"></script>
    <script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
    <script src="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.js'); }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('home/assets/js/main.js'); }}"></script>
    <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-THSBEF9P7X"></script>
   <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config','G-THSBEF9P7X' , {
                'cookie_domain': 'cursinhosolidario.org.br'
        });

   </script>
</body>
</html>
