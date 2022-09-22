<?php

$retorno = '
    <section class="slide">
    <h1>Atividade</h1>
    <figure class="imagem-licao">
        <img src="img/' . $teoria_dados['imagem'] . '.jpg" alt="Descrição da cena." />
    </figure>

    <div class="multipla-escolha">';
if ($teoria_dados['texto1'] != '') {
    $retorno .= '<div class="caixa-de-texto">
                <p>' . $teoria_dados['texto1'] . '</p>
            </div>';
}
$retorno .= ' <form>
            <input type="radio" name="ma-' . $contador . '" id="ma-' . $contador . '-1" value="1">
            <label for="ma-' . $contador . '-1">
                ' . $teoria_dados['recurso1'] . '
            </label>
            <input type="radio" name="ma-' . $contador . '" id="ma-' . $contador . '-2" value="2">
            <label for="ma-' . $contador . '-2">
                ' . $teoria_dados['recurso2'] . '
            </label>
            <input type="radio" name="ma-' . $contador . '" id="ma-' . $contador . '-3" value="3">
            <label for="ma-' . $contador . '-3">
                ' . $teoria_dados['recurso3'] . '
            </label>
            <input type="hidden" id="ma-' . $contador . '-sol" value="' . $teoria_dados['solucao'] . '">
        </form>
    </div>
    <div class="audio">
        <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, \'audio-' . $contador . ' \')">Audio</a>
        <audio id="audio-' . $contador . '">
            <source src="audio/' . $teoria_dados['audio'] . '.mp3" type="audio/mp3">
        </audio>
    </div>
</section>';
