<section class="slide">
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/<?= $teoria_dados['imagem'] ?>.jpg" alt="Descrição da cena." />
    </figure>
    <div class="caixa-de-texto">
        <p><?= nl2br($teoria_dados['texto1']) ?></p>
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