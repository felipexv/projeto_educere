<section class="slide">
    <h1><?= $teoria_dados['licao'] ?></h1>
    <?php if($teoria_dados['imagem']!=''){ ?>
    <figure class="imagem-licao">
        <img src="img/<?= $teoria_dados['imagem'] ?>.jpg" alt="Descrição da cena." />
    </figure>
    <?php } ?>
    <div class="texto preencha-frase">
        <form>
            <div class="caixa-de-texto">
                <p>
                    <?php
                    $texto = str_replace("{1}", '<input type="text" name="pf-' . $contador . '-1" id="pf-' . $contador . '1" class="conjunto">', $teoria_dados['texto1']);
                    $texto = str_replace("{2}", '<input type="text" name="pf-' . $contador . '-2" id="pf-' . $contador . '2" class="conjunto">', $texto);
                    $texto = str_replace("{3}", '<input type="text" name="pf-' . $contador . '-3" id="pf-' . $contador . '3" class="conjunto">', $texto);
                    ?>
                    <?= $texto ?>

                </p>
            </div>
            <?php
            $chaves = array();
            if ($teoria_dados['recurso1'] != '') {
                ?>
                <input type="hidden" id="pf-<?= $contador ?>1-sol" value="<?= $teoria_dados['recurso1'] ?>">
                <?php
                $chaves[] = "'pf-" . $contador . "1'";
            }
            if ($teoria_dados['recurso2'] != '') {
                ?>
                <input type="hidden" id="pf-<?= $contador ?>2-sol" value="<?= $teoria_dados['recurso2'] ?>">
                <?php
                $chaves[] = "'pf-" . $contador . "2'";
            }
            if ($teoria_dados['recurso3'] != '') {
                ?>
                <input type="hidden" id="pf-<?= $contador ?>3-sol" value="<?= $teoria_dados['recurso3'] ?>">
                <?php
                $chaves[] = "'pf-" . $contador . "3'";
            }
            ?>

            <button onclick=verificaPfrase(<?= implode(",", $chaves) ?>);  class="botao-verificar">Verificar</button>
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