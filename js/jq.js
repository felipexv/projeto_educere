var main = $('#aula');

$(document).ready(
    function () {
        redimensionar()
        $(window).resize(redimensionar);
    }
);

function redimensionar() {
    var alturaMain = $(window).height();
    var larguraMain = $(window).width();
    var licoes = $('.slide');
    licoes.each(function () {

        $(this).css({
            height: alturaMain,
            width: larguraMain
        });
    });
}