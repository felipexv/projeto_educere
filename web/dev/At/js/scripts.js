// Captura informações para transição de Aulas
var totalAulas = 0;
var totalAtividades = 0;

var nav = document.querySelector('body header nav');
nav.appendChild(sumario('.teoria .slide', 'nav-teoria', 't-'));
nav.appendChild(sumario('.atividades .slide', 'nav-atividades', 'a-'));


var hash = location.hash;

if (hash.split('-')[0] != '#a') {
    document.querySelector('#nav-atividades').classList.add('fechado');
} else if (hash.split('-')[0] == '#a') {
    document.querySelector('#nav-teoria').classList.add('fechado');
}
function sumario(query, id, seletor) {
    var secao = document.createElement("ol");
    secao.id = id;
    var slideList = document.querySelectorAll(query);
    for (var i = 0; i < slideList.length; i++) {
        var li = document.createElement("li");
        var a = document.createElement("a");

        var slide = slideList[i];
        var titulo = slide.querySelector("h1");
        slide.id = seletor + i;

        a.id = "a_#" + slide.id;
        a.onclick = function () {
            carregaaula(this.id);
        }
        a.textContent = titulo.textContent;
        li.appendChild(a);
        secao.appendChild(li);
    }
    if (seletor == 'a-') {
        totalAtividades = i - 1;
    } else {
        totalAulas = i - 1;
    }

    return secao;
}
function tocarAudio(event, audioId) {
    var audioEl = document.getElementById(audioId);
    if (!audioEl.paused) {
        audioEl.pause();
        audioEl.currentTime = 0;
    } else
        audioEl.play();
    event.preventDefault();
}
/* Prepara Próximo e Anterior
 Pega Numero da aula Atual */

var aulaAtual = 0;
var idatual = '#t-0';
var tipoAtual = '#t';
if (location.hash.split('-')[0] == '#a' || location.hash.split('-')[0] == '#t') {
    var aulaAtual = hash.split('-')[1];
    var idatual = location.hash;
    var tipoAtual = hash.split('-')[0];
}

carregaaula("a_" + idatual, false);

function carregaaula(id, pausavideo = true) {
    if (id == 'a_menu') {
        window.location.href = 'index.html';

    }
    $('.feedback_questao').hide();
    //Limpa anteriores
    $('#nav-atividades').find('li a').each(function () {
        //$(this).attr('style', '')
        $(this).removeClass('tela-atual');
    });
    $('#nav-teoria').find('li a').each(function () {
        //$(this).attr('style', '')
        $(this).removeClass('tela-atual');
    });
    document.getElementById(id).classList.add('tela-atual');
    id = id.split('_')[1];
    var tipoAtual = id.split('-')[0];
    var aulaAtual = id.split('-')[1];

    $('.slide').each(function () {
        $(this).hide();
    });
    $(id).show();
//Monta Próximo e Anterior
    var proximoLink = '';
    var anteriorLink = '';


    if (tipoAtual == '#a') {
        document.querySelector('#nav-teoria').classList.add('fechado');
        document.querySelector('#nav-atividades').classList.remove('fechado');
        if (aulaAtual == 0) {
            proximoLink = tipoAtual + '-' + (parseInt(aulaAtual) + 1);
            anteriorLink = '#t-' + totalAulas;
        } else if (aulaAtual < totalAtividades) {
            anteriorLink = tipoAtual + '-' + (parseInt(aulaAtual) - 1);
            proximoLink = tipoAtual + '-' + (parseInt(aulaAtual) + 1);
        } else {
            anteriorLink = tipoAtual + '-' + (parseInt(aulaAtual) - 1);
            proximoLink = 'menu';
        }

    }

    if (tipoAtual == '#t' || tipoAtual == '') {
        document.querySelector('#nav-teoria').classList.remove('fechado');
        document.querySelector('#nav-atividades').classList.add('fechado');
        if (aulaAtual == 0) {
            proximoLink = tipoAtual + '-' + (parseInt(aulaAtual) + 1);
        } else if (aulaAtual < totalAulas) {
            anteriorLink = tipoAtual + '-' + (parseInt(aulaAtual) - 1);
            proximoLink = tipoAtual + '-' + (parseInt(aulaAtual) + 1);
        } else {
            anteriorLink = tipoAtual + '-' + (parseInt(aulaAtual) - 1);
            proximoLink = "#a-0";
        }

    }

    $('#proximo').off('click');
    $('#anterior').off('click');
    if (anteriorLink == '') {
        $('#proximo').attr('onclick', 'carregaaula("a_' + proximoLink + '")');
        $('#proximo').show();

    } else if (proximoLink == '') {
        $('#anterior').attr('onclick', 'carregaaula("a_' + anteriorLink + '")');
        $('#anterior').show();

    } else {
        $('#proximo').attr('onclick', 'carregaaula("a_' + proximoLink + '")');
        $('#anterior').attr('onclick', 'carregaaula("a_' + anteriorLink + '")');
        $('#anterior').show();
        $('#proximo').show();
    }

    //Pausa Video se Houver

    var iframe = document.querySelector('iframe');
    if (iframe) {
        var player = new Vimeo.Player(iframe);
        if (player && pausavideo) {
            player.pause();


        }

    }
    return false;
}

//Desativa todos os submits de forms
$('body').find('form').submit(function () {
    return false;
});

//Atividades: Adiciona Validação Certo Errado
$('.multipla-escolha>form>label').click(function () {
    var input = $('#' + $(this).attr('for'));
    var valorcorreto = $('#' + input.attr('name') + "-sol").val();
    if (input.val() == valorcorreto) {

//        $('.feedback_questao').hide();
//        $('.feedback_questao').css('background-color', '#72b5a4e3');
//        $('.feedback_questao').html('Parabéns! Você acertou.');
//        $('.feedback_questao').show();
        $(this).css('font-size', '40px');
        $(this).css('background-color', '#1ca20d');

    } else {
        $('.feedback_questao').hide();
//        $('.feedback_questao').css('background-color', '#ffabb4e3');
//        $('.feedback_questao').html('Tente novamente.');
//        $('.feedback_questao').show();
        $(this).css('font-size', '20px');
        $(this).css('background-color', '#a23b3b');
    }

});

//$('input[type="text"]').change(function () {
//    var valorcorreto = $('#' + this.name + "-sol").val();
//    if (this.value.toLowerCase() == valorcorreto.toLowerCase()) {
//        $('.feedback_questao').hide();
//        $('.feedback_questao').css('background-color', '#72b5a4e3');
//        $('.feedback_questao').html('Parabéns! Você acertou.');
//        $('.feedback_questao').show();
//        return false;
//
//    } else {
//        this.value = '';
//        $('.feedback_questao').hide();
//        $('.feedback_questao').css('background-color', '#ffabb4e3');
//        $('.feedback_questao').html('Tente novamente.');
//        $('.feedback_questao').show();
//        return false;
//    }
//

//});

//Habilita Fullscreen
$(document).ready(function () {
    $('body').show();
    $(".fullscreen_button").on("click", function ()
    {

        if ($(this).hasClass('sair')) {
            this.src = 'img/fullscreen-entrar.svg';
            $(this).removeClass('sair');
        } else {
            $(this).addClass('sair')
            this.src = 'img/fullscreen-sair.svg';
        }
        document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
    });
});

//Habilita Liga Coluna

//Randomiza li
$.fn.randomize = function (selector) {
    var $elems = selector ? $(this).find(selector) : $(this).children(),
            $parents = $elems.parent();

    $parents.each(function () {
        $(this).children(selector).sort(function () {
            return Math.round(Math.random()) - 0.5;
            // }). remove().appendTo(this); // 2014-05-24: Removed `random` but leaving for reference. See notes under 'ANOTHER EDIT'
        }).detach().appendTo(this);
    });

    return this;
};
function verificaligacoluna(botao) {
    var itemOrder = $(botao).parent('.sortableContainer').sortable("toArray");
    for (var i = 0; i < itemOrder.length; i++) {
        //Pega o Vinculo da coluna principal
        var vinculo = $('#' + itemOrder[i]).attr('vinculo');
        if ($('#' + itemOrder[i]).html() === $('#' + vinculo + (i + 1) + 'sol').attr('sol')) {
            $('#' + itemOrder[i]).css('background-color', 'green');
        } else {
            $('#' + itemOrder[i]).css('background-color', 'gray');
        }
    }
}
$(document).ready(function () {
    $('.liga-coluna').find('.sortableContainer').each(function () {
        $(this).randomize();
//Transforma em sortable
        $(this).sortable();
        $('<div style=clear:both></div><button onclick=verificaligacoluna(this) class="verificar">Verificar</button>').appendTo(this);
    });
});


function geraLigaColuna(dados, identificador, idbxslots, idbxalternativas) {
    // Reset the game

    $('#' + idbxslots).html('');
    $('#' + idbxalternativas).html('');
    // Create the pile of shuffled cards


    for (var i = 0; i < dados.length; i++) {
        $('<div id=opcao' + identificador + '1' + i + ' >' + dados[i]['opcao1'] + '</div>').data({valor: dados[i]['opcao1']}).attr('id', 'cardopcao' + identificador + i).appendTo('#' + idbxalternativas).draggable({
            stack: '#cardPile div',
            cursor: 'move',
            revert: true
        });
        $('<div id=opcao' + identificador + '2' + i + ' >' + dados[i]['opcao2'] + '</div>').data({valor: dados[i]['opcao2']}).attr('id', 'cardopcao' + identificador + '2' + i).appendTo('#' + idbxalternativas).draggable({
            stack: '#' + idbxalternativas + ' div',
            cursor: 'move',
            revert: true
        });

        $('<div id=opcaoa' + identificador + '1' + i + '>' + dados[i]['texto'] + '</div>').data({opcao1: dados[i]['opcao1'], opcao2: dados[i]['opcao2']}).appendTo('#' + idbxslots).droppable({
            accept: '#' + idbxalternativas + ' div',
            hoverClass: 'hovered',
            drop: handleCardDrop
        });

        $('<div id=opcaoa' + identificador + '2' + i + '>' + dados[i]['texto'] + '</div>').data({opcao1: dados[i]['opcao1'], opcao2: dados[i]['opcao2']}).appendTo('#' + idbxslots).droppable({
            accept: '#' + idbxalternativas + ' div',
            hoverClass: 'hovered',
            drop: handleCardDrop
        });
    }
//Randomiza opcoes
    $('#' + idbxslots).randomize();
    $('#' + idbxalternativas).randomize();
    // Create the card slots

    function handleCardDrop(event, ui) {
        var opcao1 = $(this).data('opcao1');
        var opcao2 = $(this).data('opcao2');
        var valor = ui.draggable.data('valor');
        // If the card was dropped to the correct slot,
        // change the card colour, position it directly
        // on top of the slot, and prevent it being dragged
        // again

        if ((valor == opcao1) || (valor == opcao2)) {
            ui.draggable.addClass('correct');
            ui.draggable.draggable('disable');
            $(this).droppable('disable');
            ui.draggable.position({of: $(this), my: 'left top', at: 'left top'});
            ui.draggable.draggable('option', 'revert', false);
            correctCards++;
        }

        // If all the cards have been placed correctly then display a message
        // and reset the cards for another go



    }
}