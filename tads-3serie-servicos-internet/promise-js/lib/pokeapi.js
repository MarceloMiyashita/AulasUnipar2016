$(document).ready(iniciar);
function iniciar() {
  $('#botao').on('click', carregar);
}

function esconderLoading() {
  $('#loading').hide();
}
function mostrarLoading() {
  $('#loading').show();
}

function carregar() {
  /*
    1. Mostrar Carregando
    2. Pegar numero que usuario informou
    3. Pesquisar na API a informacao do Pokemon *
    4. Pesquisar em outra API informacoes complementares *
    5. Processar (gerar dados no formato que eu preciso)
    6. Mostrar nome
    7. Fazer download das imagens
    8. Mostrar imagens
    9. Informacoes de tipo
    10.Esconder Carregando
  */

  Promise.resolve(null)
    .then(mostrarLoading) // 1
    .then(pegarNumero) // 2
    .then(carregarPokemon) // 3
    .then(mostrarNome) // 6
    .then(mostrarImagens) // 8
    .then(mostrarTipos) // 9
    .then(esconderLoading) // 10
    ;
}

function pegarNumero(result) {
  var numero = $('#fnumero').val();
  return numero;
}

function carregarPokemon(result) {
  var p = new Promise(function(resolve, reject) {
    var url = 'http://pokeapi.co/api/v2/pokemon/' + result + '/';
    var r = $.get(url);
    r.done(function(data) {
      resolve(data);
    });
  });
  return p;
}

function mostrarNome(result) {
  var html = '#' + result.id + ' - ' + result.name;
  $('#nome').html(html);

  return result;
}

function mostrarImagens(result) {
  var html = '';
  html += '<img src="' + result.sprites.front_default + '" />';
  html += '<img src="' + result.sprites.back_default + '" />';
  $('#imgs').html(html);

  return result;
}

function mostrarTipos(result) {
  var html = [];
  for (var i in result.types) {
    var tipo = result.types[i];

    html.push('<span>' + tipo.type.name + '</span>');
  }
  $('#tipos').html('Tipos: ' + html.join(' - '));
}












/////
