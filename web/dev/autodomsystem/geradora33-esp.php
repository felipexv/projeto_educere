<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$teoria[] = array('modelo' => 'video', 'licao' => 'Ponto Gramatical', 'imagem' => '', 'audio' => '', 'texto1' => 'IDVIDEO', 'texto2' => '', 'texto3' => '', 'texto4' => '', 'recurso1' => '', 'recurso2' => '', 'recurso3' => '', 'texto' => '', 'recurso5' => '', 'solucao' => '', 'solucao2' => '', 'audiosolucao' => '');
$atividade[]=array('modelo'=>'introducaoatividade','licao'=>'','imagem'=>'','audio'=>'','texto1'=>'Escolha a opção correta','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'','recurso2'=>'','recurso3'=>'','texto'=>'','recurso5'=>'','solucao'=>'','solucao2'=>'','audiosolucao'=>'');
$atividade[]=array('modelo'=>'multiplaescolha','licao'=>'','imagem'=>'3.2','audio'=>'azul','texto1'=>'','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'azul','recurso2'=>'verde','recurso3'=>'amarelo','texto'=>'O céu é','recurso5'=>'','solucao'=>'1','solucao2'=>'','audiosolucao'=>'');
$atividade[]=array('modelo'=>'multiplaescolha','licao'=>'','imagem'=>'3.14','audio'=>'3.14','texto1'=>'','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'azul, amarela e encarnada','recurso2'=>'azul, branca e vermelha','recurso3'=>'azul, branca e rocha','texto'=>'A bandeira da França é','recurso5'=>'','solucao'=>'2','solucao2'=>'','audiosolucao'=>'');
$atividade[]=array('modelo'=>'multiplaescolha','licao'=>'','imagem'=>'3.4','audio'=>'3.4','texto1'=>'','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'amarelo','recurso2'=>'preto','recurso3'=>'cincento','texto'=>'O céu está','recurso5'=>'','solucao'=>'3','solucao2'=>'','audiosolucao'=>'');
$atividade[]=array('modelo'=>'multiplaescolha','licao'=>'','imagem'=>'3.1','audio'=>'3.1','texto1'=>'','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'pretas','recurso2'=>'amarelas','recurso3'=>'vermelhas','texto'=>'As flores são','recurso5'=>'','solucao'=>'2','solucao2'=>'','audiosolucao'=>'');
$atividade[]=array('modelo'=>'multiplaescolha','licao'=>'','imagem'=>'3.3','audio'=>'3.3','texto1'=>'','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'brancas','recurso2'=>'castanhas','recurso3'=>'cinzentas','texto'=>'As nuvens são','recurso5'=>'','solucao'=>'1','solucao2'=>'','audiosolucao'=>'');
$atividade[]=array('modelo'=>'multiplaescolha','licao'=>'','imagem'=>'3.7','audio'=>'3.7 (1)','texto1'=>'','texto2'=>'','texto3'=>'','texto4'=>'','recurso1'=>'castanhos','recurso2'=>'brancos','recurso3'=>'azuis','texto'=>'Os sapatos são','recurso5'=>'','solucao'=>'1','solucao2'=>'','audiosolucao'=>'');
?>
<textarea>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet">
        <title>Instituto Educere</title>
    </head>

    <body style="display:none">
        <header>
            <h1>Ponto Gramatical</h1>
            <nav>
                <a href="index.html" id="nav-modulos">Selecionar Módulo</a>
            </nav>
        </header>
        <main id="aula">
            <article class="teoria">
                    <?php
                    $contador = 0;
                    foreach ($teoria as $teoria_dados) {
                        include('geradores/' . $teoria_dados['modelo'] . '.php');
                        $contador++;
                    }
                    ?>

            </article>

            <article class="atividades fechado">
                    <?php
                    foreach ($atividade as $teoria_dados) {
                        include('geradores/' . $teoria_dados['modelo'] . '.php');
                        $contador++;
                    }
                    ?>



            </article>


            <!-- Navegacação -->
            <a id="anterior" class="navegacao"><img src="img/seta-esquerda.svg" /> </a>
            <a id="proximo" class="navegacao"><img src="img/seta-direita.svg" /> </a>

            <img class="fullscreen_button" src="img/fullscreen-entrar.svg" />
            <div class="feedback_questao" style="z-index: 999;position: absolute;top: 50%;right: 40%;padding: 20px;font-size: 33px;display:none">


            </div>
        </main>
        <footer>


        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="js/jquery.ui.touch-punch.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jq.js"></script>
    </body>

</html>
</textarea>