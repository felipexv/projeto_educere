<section class="slide">
    <h1><?= $teoria_dados['licao'] ?></h1>
    <figure class="imagem-licao">
        <img src="img/0.png" alt="Descrição da cena." />
    </figure>
    <div class="liga-coluna">
        <?php
        $coluna1 = explode(',', $teoria_dados['recurso1']);
        $coluna2 = explode(',', $teoria_dados['recurso2']);
        $ul1 = '';
        $ul2 = '';
        $cont = 0;
        foreach ($coluna1 as $col1) {
            $ul1 .= "<li id='opcao$contador" . $cont . "sol' class='sortIt' ordem='" . $cont . "' sol='" . $coluna2[$cont] . "' >" . $col1 . "</li>";
            $ul2 .= "<li id='opcao$contador" . $cont . "' vinculo='opcao$contador' class='sortIt' ordem='" . $cont . "' >" . $coluna2[$cont] . "</li>";
            $cont++;
        }
        ?>
        <ul class="Itens" style="list-style:none;float:left">
            <?= $ul1 ?>
        </ul>
        <ul class="sortableContainer" style="float:left">
            <?= $ul2 ?>
        </ul>
        <br><br>
    </div>
</section>