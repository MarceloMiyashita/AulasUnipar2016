// window.onload = function() {}
//$(window).on('load', htmlCarregado);

$(window).ready(htmlPronto);

function htmlPronto() {
  $('#botao').on('click', botaoClicado);
}

function mudarH1() {
  $('h1').css({
    'color':'#FF0000',
    'font-size': '50px'
  });
}

function botaoClicado() {
  mudarH1();
  mostrarLoading();
  carregarNumeros();
}

function addElemento(n) {
  var html = $('#produtosSelecao').html();
  html += '<option value="'+n+'">Elemento '+n+'</option>';
  $('#produtosSelecao').html(html);
}

function mostrarLoading() {
  $('#idSpan').show(1000);
}
function esconderLoading() {
  $('#idSpan').hide(1000);
}

function carregarNumeros() {
  var r = $.get({
    url: 'https://qrng.anu.edu.au/API/jsonI.php?length=5&type=uint16',
  });
  r.done(function(dados){
    addElemento(dados.data[2]);
    esconderLoading();
  });
}









/**/
