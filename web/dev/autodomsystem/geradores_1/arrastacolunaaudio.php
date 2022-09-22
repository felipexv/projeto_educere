<section class="slide" >
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="dragdrop arrastacolunaaudio">
        <?php
        $audios = explode(',', $teoria_dados['audio']);
        $texto = $teoria_dados['texto1'];
        $opcoes = explode(',', str_replace(";", ",",$teoria_dados['solucao']));

        //Cria os espaços de envio
        $i = 0;
        foreach ($opcoes as $key => $value) {
            $contador++;
            $input = '<div class="ui-widget-header ui-droppable " id="droppable' . $contador . $i . '" sol="' . $value . '">Arraste aqui</div>';
            $texto = str_replace("{" . ($key+1) . "}", $input, $texto);
            $i++;
        }

        $textos = explode(',', $texto);
        ?>
        <div class="opcoes">
            <?php
            for ($i = 0; $i < count($opcoes); $i++) {
                ?>
                <div class="ui-draggable" id="draggable<?= $contador . $i ?>"><p><?= $opcoes[$i] ?></p></div>
            <?php }
            ?>
        </div>
        <div class="textos">
            <?php
            for ($i = 0; $i < count($textos); $i++) {
                ?>
                <div>
                    <p>
                        <?= $textos[$i] ?>
                    </p>
                    <?php if (isset($audios[$i]) and $audios[$i] != '') { ?>
                        <div class="audio">
                            <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, 'audio-c<?= $contador . '-' . $i ?>')">Audio</a>
                            <audio id="audio-c<?= $contador . '-' . $i ?>">
                                <source src="audio/<?= $audios[$i] ?>.mp3" type="audio/mp3">
                            </audio>
                        </div>
                        <?php
                        $contador++;
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
        <button onclick=verificaDragDrop(); class=verificar>Verificar</button>
    </div>
</section>