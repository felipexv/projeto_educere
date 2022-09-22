<section class="slide">
    <h1><?= $teoria_dados['licao'] ?></h1>
    <?php if ($teoria_dados['imagem'] != '') { ?>
        <figure class="imagem-licao">
            <img src="img/<?= $teoria_dados['imagem'] ?>.jpg" alt="Descrição da cena." />
        </figure>
    <?php } ?>
    <div class="texto preencha-frase preenchefrasen">
        <form>
            <div class="caixa-de-texto">
                <p>
                    <?php
                    $solucoes = explode(';', $teoria_dados['solucao']);
                    $i = 0;
                    $texto = $teoria_dados['texto1'];
                    foreach ($solucoes as $key => $value) {
                        $input = '<input type="text" name="pf-' . $contador . '-' . $i . '" id="pf-' . $contador . $i . '" class="conjunto pf-' . $contador . '">'
                                . '<input type="hidden" id="pf-' . $contador . $i . '-sol" value="' . $value . '">';
                        $texto = str_replace("{".($key+1)."}", $input, $texto);
                        
                    }
                    ?>
                    <?= nl2br($texto) ?>

                </p>
            </div>

            <button onclick=verificaPfraseN('pf-<?= $contador ?>');  class="botao-verificar">Verificar</button>
        </form>
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