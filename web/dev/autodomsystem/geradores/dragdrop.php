<section class="slide" >
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="dragdrop">
        <?php
        $audios = explode(',', $teoria_dados['audio']);
        $textos = explode(',', $teoria_dados['recurso1']);
        $opcoes = explode(',', $teoria_dados['recurso2']);
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
                    <div class="ui-widget-header ui-droppable " id="droppable<?= $contador . $i ?>" sol="<?= $opcoes[$i] ?>">Arraste aqui</div>
                    </p>
                    <?php if ($audios[$i] != '') { ?>
                        <div class="audio">
                            <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, 'audio-c<?= $contador . '-' . $i ?>')">Audio</a>
                            <audio id="audio-c<?= $contador . '-' . $i ?>">
                                <source src="audio/<?= $audios[$i] ?>.mp3" type="audio/mp3">
                            </audio>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
        <button onclick=verificaDragDrop(); class=verificar>Verificar</button>
    </div>
</section>