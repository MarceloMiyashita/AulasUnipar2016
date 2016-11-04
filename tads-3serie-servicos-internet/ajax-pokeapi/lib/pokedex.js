// window.onload = function() {}
//$(window).on('load', htmlCarregado);

$(window).ready(htmlPronto);

var base = 'http://pokeapi.co/api/v2/';
var imgModelo = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/NUMERO.png';

function htmlPronto() {
  carregarLista();
}

function mostrarLoading() {
  $('#loading').show(200);
}
function esconderLoading() {
  $('#loading').hide(200);
}

function carregarLista() {
  mostrarLoading();

  var r = $.get(base + 'pokemon/?limit=1000');
  r.fail(function() {
    window.alert('Falha em carregar Lista de Pokemons');
  });
  r.always(function() {
    esconderLoading();
  });
  r.done(montarLista);
}
function montarLista(dados) {

  var modelo = '<li data-numero="NUMERO"><img src="IMG"><span>NUMERO - NOME</span></li>';

  var html = '';
  for (var i in dados.results) {
    var numero = parseInt(i) + 1;
    if (numero > 721) {
      continue;
    }

    var img = imgModelo.replace('NUMERO', numero);
    html += modelo
          .replace('IMG', img)
          .replace('NUMERO', numero)
          .replace('NUMERO', numero)
          .replace('NOME', ucfirst(dados.results[i].name));
  }

  $('#lista').html(html);
  $('#lista li').on('click', carregarPokemon);
}
function mostrarDetalhes() {
  $('#detalhes').show();
}
function esconderDetalhes() {
  $('#detalhes').hide();
}
function carregarPokemon() {
  esconderDetalhes();
  mostrarLoading();

  var numero = $(this).data('numero');

  var url = base + 'pokemon/' + numero + '/';

  var r = $.get(url);
  r.fail(function() {
    window.alert('Erro para carregar dados do Pokemon ' + numero);
  });
  r.done(pokemonCarregado);
  r.always(function() {
    esconderLoading();
  });
}
function pokemonCarregado(dados) {
  var numero = dados.id;
  var nome = ucfirst(dados.name);
  // var foto = imgModelo.replace('NUMERO', numero);
  var foto = dados.sprites.front_default;

  var html;

  // html = $('#detalhes h1').html();
  html = "#NUMERO - NOME"
        .replace('NUMERO', numero)
        .replace('NOME', nome);
  $('#detalhes h1').html(html);

  $('#foto').attr('src', foto);

  pokemonTipos(dados.types);
  pokemonStats(dados.stats);

  mostrarDetalhes();
}
function pokemonTipos(tipos) {
  var html = '';

  for (var i in tipos) {
    var tipo = tipos[i].type.name;
    html += '<li>' + ucfirst(tipo) + '</li>';
  }
  $('#tipos').html(html);
}
function pokemonStats(stats) {
  var modelo = '<li>'
  + '<strong>STAT</strong>'
  + '<span class="statItem">'
  + '<span class="statValor">VALOR</span>'
  + '<span class="statGrafico" style="width:PORC%;"></span>'
  + '</span>'
  + '</li>';
  var html = '';

  for (var i in stats) {
    var stat = stats[i];
    var base_stat = stat.base_stat;

    var porc = Math.ceil( base_stat / 170 * 100 );
    if (porc < 30) {
      porc = 15;
    }

    html += modelo
        .replace('STAT', stat.stat.name)
        .replace('VALOR', base_stat)
        .replace('PORC', porc)
  }

  $('#stats').html(html);
}
function ucfirst (str) {
  //  discuss at: http://locutus.io/php/ucfirst/
  // original by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
  // improved by: Brett Zamir (http://brett-zamir.me)
  //   example 1: ucfirst('kevin van zonneveld')
  //   returns 1: 'Kevin van zonneveld'

  str += ''
  var f = str.charAt(0)
    .toUpperCase()
  return f + str.substr(1)
}












/**/
