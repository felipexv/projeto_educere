<?php
$dados = array();
$ContagemID = 20;
$dados[] = array('Numero' => '5', 'Desc' => 'Cinco');
$dados[] = array('Numero' => '7', 'Desc' => 'Sete');
$dados[] = array('Numero' => '1', 'Desc' => 'Um');
$dados[] = array('Numero' => '3', 'Desc' => 'Três');
$dados[] = array('Numero' => '8', 'Desc' => 'Oito');
$dados[] = array('Numero' => '13', 'Desc' => 'Treze');
$dados[] = array('Numero' => '9', 'Desc' => 'Nove');
$dados[] = array('Numero' => '16', 'Desc' => 'Dezasseis');
$dados[] = array('Numero' => '10', 'Desc' => 'Dez');
$dados[] = array('Numero' => '18', 'Desc' => 'Dezoito');
$dados[] = array('Numero' => '12', 'Desc' => 'Doze');
$dados[] = array('Numero' => '6', 'Desc' => 'Seis');
$dados[] = array('Numero' => '20', 'Desc' => 'Vinte');
$dados[] = array('Numero' => '15', 'Desc' => 'Quinze');
$dados[] = array('Numero' => '11', 'Desc' => 'Onze');
$dados[] = array('Numero' => '2', 'Desc' => 'Dois');
$dados[] = array('Numero' => '17', 'Desc' => 'Dezassete');
$dados[] = array('Numero' => '19', 'Desc' => 'Dezanove');
$dados[] = array('Numero' => '14', 'Desc' => 'Catorze');

foreach ($dados as $dado) {
    ?>
    <section class="slide">
        <h1>Atividade</h1>
        <figure class="imagem-licao">
            <img src="img/0.png" alt="Descrição da cena." />
        </figure>
        <div class="texto">
            <div class="caixa-de-texto numero">
                <p><?= $dado['Numero']; ?></p>
            </div>
            <form>
                <input type="text" name="ma-<?= $ContagemID ?>" id="ma-<?= $ContagemID ?>-a">
                <input type="hidden" id="ma-<?= $ContagemID ?>-sol" value="<?= $dado['Desc']; ?>">
            </form>
        </div>
        <div class="audio">
            <a href="#" class="botao-circ-audio" onclick="tocarAudio(event, 'audio-<?= $dado['Numero']; ?>')">Audio</a>
            <audio id="audio-<?= $dado['Numero']; ?>">
                <source src="audio/<?= $dado['Numero']; ?>.mp3" type="audio/mp3">
            </audio>
        </div>
    </section>





    <?php
    $ContagemID++;
}
