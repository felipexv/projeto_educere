<?php

$retorno = '
<section class="slide">
    <h1>Atividade</h1>';
if ($teoria_dados['imagem'] != '') {
    $retorno .= '
 <figure class="imagem-licao">
            <img src="img/' . $teoria_dados['imagem'] . '.jpg" alt="Descrição da cena." />
        </figure>';
}
$retorno .= '<div class = "texto">';
if ($teoria_dados['texto1'] != '') {

    $retorno .= '<div class="caixa-de-texto">
    <p>' . $teoria_dados['texto1'] . '</p>
</div>';
} else {
    $retorno .= '<div class="caixa-de-texto">
    <p>' . $teoria_dados['recurso1'] . '</p>
</div>
<div class="caixa-de-texto">
    <p>' . $teoria_dados['recurso2'] . '</p>
</div>
<div class="caixa-de-texto">
    <p>' . $teoria_dados['recurso3'] . '</p>
</div>';
}
$retorno .= '
<form>
    <input type="text" name="ma-' . $contador . '" id="ma-' . $contador . '-a">
    <input type="hidden" id="ma-' . $contador . '-sol" value="' . $teoria_dados['solucao'] . '">
</form>
</div>';
if ($teoria_dados['audio'] != '') {
    $retorno .= '
    <div class="audio">
        <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, \'audio-' . $contador . '\')">Audio</a>
        <audio id="audio-' . $contador . '">
            <source src="audio/' . $teoria_dados['audio'] . '.mp3" type="audio/mp3">
        </audio>
    </div>';
}
$retorno .= '
</section>';
