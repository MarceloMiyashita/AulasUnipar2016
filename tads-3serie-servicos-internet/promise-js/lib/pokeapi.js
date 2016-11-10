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
    ;
}

function pegarNumero(result) {
  var numero = $('#fnumero').val();
  return numero;
}

function carregarPokemon(result) {
  console.log(result);
}




/////
