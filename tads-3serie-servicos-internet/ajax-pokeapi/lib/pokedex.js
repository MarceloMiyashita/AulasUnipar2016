// window.onload = function() {}
//$(window).on('load', htmlCarregado);

$(window).ready(htmlPronto);

var base = 'http://pokeapi.co/api/v2/';

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

  var r = $.get(base + 'pokemon/?limit=20');
  r.fail(function() {
    window.alert('Falha em carregar Lista de Pokemons');
  });
  r.always(function() {
    esconderLoading();
  });
  r.done(montarLista);
}
function montarLista(dados) {
  var imgModelo = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/NUMERO.png';
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
          .replace('NOME', dados.results[i].name);
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

  console.log($(this));
}













/**/
