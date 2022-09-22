<section class="slide" >
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="conjugacao">
        <h2><?= $teoria_dados['licao'] ?>
        </h2>

        <?php
        $textos1 = explode(',', $teoria_dados['texto1']);
        $textos2 = explode(',', $teoria_dados['texto2']);
        $textos3 = explode(',', $teoria_dados['texto3']);
        $textos4 = explode(',', $teoria_dados['texto4']);
        for ($i = 0; $i < count($textos1); $i++) {
            ?>
            <div>
                <p>
                    <span><?= (isset($textos1[$i])) ? $textos1[$i] : ""; ?></span>
                    <span><?= (isset($textos2[$i])) ? $textos2[$i] : ""; ?></span>
                    <span><?= (isset($textos3[$i])) ? $textos3[$i] : ""; ?></span>
                    <span><?= (isset($textos4[$i])) ? $textos4[$i] : ""; ?></span>
                </p>
            </div>

            <?php
        }
        ?>
    </div>
    <?php if ($teoria_dados['audio'] != '') { ?>
        <div class="audio">
            <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, 'audio-<?= $contador ?>')">Audio</a>
            <audio id="audio-<?= $contador ?>">
                <source src="audio/<?= $teoria_dados['audio'] ?>.mp3" type="audio/mp3">
            </audio>
        </div>
    <?php } ?>
</section>