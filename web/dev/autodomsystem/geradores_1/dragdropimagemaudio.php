<?php

$retorno = '
<section class="slide" >
    <h1>' . $teoria_dados['licao'] . '</h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="dragdrop">';

$audios = explode(';', $teoria_dados['audio']);
$texto = $teoria_dados['texto1'];
$opcoes = explode(';', $teoria_dados['solucao']);
$retorno .= '        <div class="opcoes">';

for ($i = 0; $i < count($opcoes); $i++) {
    $retorno .= ' <div class="ui-draggable" id="draggable' . $contador . $i . '"><p><img src="' . $opcoes[$i] . '.png" identificado=' . $opcoes[$i] . ' ></p></div>';

    $replace = '<div>
            <p>
            <div class="ui-widget-header ui-droppable " id="droppable' . $contador . $i . '" sol="' . $opcoes[$i] . '">Arraste aqui</div>
            </p>';
    if ($audios[$i] != '') {
        $replace .= ' <div class="audio">
                    <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, \'audio-c' . $contador . '-' . $i . '\')">Audio</a>
                    <audio id="audio-c' . $contador . '-' . $i . '">
                        <source src="audio/' . $audios[$i] . '.mp3" type="audio/mp3">
                    </audio>
                </div>';
    }

    $replace .= '</div>';
    $texto = str_replace("{" . ($i + 1) . "}", $replace, $texto);
}

$retorno .= '</div> <div class="textos">' . $texto . '
</div>
<button onclick=verificaDragDropImagem(); class=verificar>Verificar</button>
</div>
</section>';
