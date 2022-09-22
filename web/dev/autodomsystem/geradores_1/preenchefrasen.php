<?php

$retorno = '<section class="slide">
    <h1>' . $teoria_dados['licao'] . '</h1>';
if ($teoria_dados['imagem'] != '') {
    $retorno .= ' <figure class="imagem-licao">
            <img src="img/' . $teoria_dados['imagem'] . '.jpg" alt="Descrição da cena." />
        </figure>';
}
$retorno .= '<div class="texto preencha-frase preenchefrasen">
        <form>
            <div class="caixa-de-texto">
                <p>';

$solucoes = explode(';', $teoria_dados['solucao']);
$i = 0;
$texto = $teoria_dados['texto1'];
foreach ($solucoes as $key => $value) {
    $input = '<input type = "text" name = "pf-' . $contador . '-' . $i . '" id = "pf-' . $contador . $i . '" class = "conjunto pf-' . $contador . '">'
            . ' < input type = "hidden" id = "pf-' . $contador . $i . '-sol" value = "' . $value . '">';
    $texto = str_replace("{" . ($key + 1) . "}", $input, $texto);
}
$retorno .= nl2br($texto);
$retorno .= '
</p>
</div>

<button onclick=verificaPfraseN(\'pf-' . $contador . '\');  class="botao-verificar">Verificar</button>
</form>
</div>';

if ($teoria_dados['audio'] != '') {
    $retorno .= '<div class="audio">
        <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, \'audio-' . $contador . '\')">Audio</a>
        <audio id="audio-' . $contador . '">
            <source src="audio/' . $teoria_dados['audio'] . '.mp3" type="audio/mp3">
    </audio>
    </div>';
}
$retorno .= '</section>';
