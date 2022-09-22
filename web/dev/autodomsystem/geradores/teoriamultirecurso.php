<section class="slide" >
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="lista-numeros">
        <?php
        $imagens = explode(',', $teoria_dados['imagem']);
        $audios = explode(',', $teoria_dados['audio']);
        $textos = explode(',', $teoria_dados['texto1']);

        for ($i = 0; $i < count($textos); $i++) {
            ?>
            <div>
                <p><?php
                
                 if (isset($imagens[$i]) && $imagens[$i]!=0) {
                        ?> 
                        <img src='img/<?= $imagens[$i] ?>.jpg'>
                    <?php }
                    ?>
                    <?= $textos[$i] ?></p>
                <?php if (isset($audios[$i])) { ?>
                    <div class="audio">
                        <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, 'audio-c<?= $contador . '-' . $i ?>')">Audio</a>
                        <audio id="audio-c<?= $contador . '-' . $i ?>">
                            <source src="audio/<?= $audios[$i] ?>.mp3" type="audio/mp3">
                        </audio>
                    </div>
                <?php } ?>
            </div>
            <?php
        }
        ?>
    </div>
</section>