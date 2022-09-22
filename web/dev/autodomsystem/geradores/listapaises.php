<section class="slide" >
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="lista">
        <?php
        $imagens = explode(',', $teoria_dados['imagem']);
        $audios = explode(',', $teoria_dados['audio']);
        $textos = explode(',', $teoria_dados['texto1']);
        $textos2 = explode(',', $teoria_dados['texto2']);
        for ($i = 0; $i < count($imagens); $i++) {
            ?>
            <div>
                <p>
                <table class="lista-pais">
                    <tr>
                        <td><?php
                            if ($imagens[$i] != 0) {
                                ?> 
                                <img src='img/<?= $imagens[$i] ?>.jpg'>
                            <?php }
                            ?>
                            <?= $textos[$i] ?>
                        </td>
                        <td>
                            <?= nl2br(str_replace('\r', '<br>', $textos2[$i])) ?>
                        </td>
                    </tr>
                </table>
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
</section>