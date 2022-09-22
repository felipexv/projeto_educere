
<?php

$retorno .= '<section class="slide">    
    <div class="instrucoes iframepdf">         
        <h1>Atividade</h1>         
        <p>'.nl2br($teoria_dados['texto1']).'</p>
    </div> ';

if ($teoria_dados['audio'] != '') {
    $retorno .= '<div class="audio">
        <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, \'audio-' . $contador . '\')">Audio</a>
        <audio id="audio-' . $contador . '">
            <source src="audio/' . $teoria_dados['audio'] . '.mp3" type="audio/mp3">
    </audio>
    </div>';
}
$retorno .= '</section>';