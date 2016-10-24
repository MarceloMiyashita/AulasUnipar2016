window.onload = iniciar;
function iniciar() {
  var frm = document.querySelector('#frm');
  frm.addEventListener('submit', formulario)
}

function formulario(evento) {
  evento.preventDefault();

  var n1 = document.querySelector('#n1');
  var n2 = document.querySelector('#n2');
  var res = document.querySelector('#res');

  var resultado = parseInt(n1.value) + parseInt(n2.value);

  res.value = resultado;
  res.disabled = true;
}

















/**/
