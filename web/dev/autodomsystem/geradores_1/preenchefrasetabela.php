<section class="slide">
    <h1><?= $teoria_dados['licao'] ?></h1>
    <?php if ($teoria_dados['imagem'] != '') { ?>
        <figure class="imagem-licao">
            <img src="img/<?= $teoria_dados['imagem'] ?>.jpg" alt="Descrição da cena." />
        </figure>
    <?php } ?>
    <div class="preencha-frase preenchefrasetabela">
        
            <div class="conjugacao">

                <?php
                $solucoes = explode(';', $teoria_dados['solucao']);
                $i = 0;
                $texto = $teoria_dados['texto1'];
                foreach ($solucoes as $key => $value) {

                    $input = '<input type="text" name="pf-' . $contador . '-' . $i . '" id="pf-' . $contador . $i . '" class="conjunto pf-' . $contador . '">'
                            . '<input type="hidden" id="pf-' . $contador . $i . '-sol" value="' . $value . '">';
                    $texto = str_replace("{".($key+1)."}", $input, $texto);
                }

                $textos = explode(',', $texto);
                foreach ($textos as $texto) {
                    $textoslinha = explode(';', $texto);
                    ?>
                    <div>
                        <p>
                            <?php
                            foreach ($textoslinha as $tl) {
                                ?>
                                <span><?= $tl ?></span>
                                <?php
                            }
                            ?>
                        </p>
                    </div>
                    <?php
                }
                ?>




            </div>

            <button onclick=verificaPfraseN('pf-<?= $contador ?>');  class="verificar">Verificar</button>
        
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