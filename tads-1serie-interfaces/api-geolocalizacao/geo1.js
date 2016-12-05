window.onload = iniciar;

function iniciar() {
  document.querySelector('#botao')
    .addEventListener('click', botaoClicado);
}

function botaoClicado() {
  if (navigator.geolocation) {
    navigator.geolocation
      .getCurrentPosition(posicaoOk, posicaoErro);
  } else {
    window.alert('Navegador sem suporte a geolocalizacao');
  }
}
function posicaoOk(position) {
  console.log(position.coords);

  document.querySelector('#lat ins')
    .innerHTML = position.coords.latitude;
  document.querySelector('#lon ins')
    .innerHTML = position.coords.longitude;

  if (position.coords.altitude != null) {
    document.querySelector('#alt ins')
      .innerHTML = position.coords.altitude;
  }

  document.querySelector('#pre ins').innerHTML = (position.coords.accuracy / 1000) + ' km';
}
function posicaoErro(erro) {
  console.log(erro);
}
