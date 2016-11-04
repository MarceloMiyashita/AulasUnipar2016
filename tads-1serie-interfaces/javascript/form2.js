window.onload = function() {
  document.getElementById('frm')
    .addEventListener('submit', frmSubmit);
}

function frmSubmit(evento) {
  var msg = [];

  //var fnome = document.getElementById('nome');
  var fnome = document.querySelector('#nome');
  var nome = fnome.value;

  if (nome == '') {
    msg.push('Informe o nome');
  }
  else if (nome.length < 5) {
    msg.push('Nome deve ter no mínimo 5 caracteres');
  }
  else if (nome.indexOf(' ') < 1) {
    msg.push('Informe o nome completo');
  }

  var fcpf = document.getElementById('cpf');
  var cpf = fcpf.value;
  if (cpf.length == 10) {
    cpf = "0" + cpf;
    fcpf.value = cpf;
  }
  if (cpf.length != 11) {
    msg.push('CPF deve ter 11 dígitos');
  }
  else if (TestaCPF(cpf) == false) {
    msg.push('Informe um CPF correto');
  }

  if (msg.length > 0) {
    msg = msg.join("\n");
    window.alert(msg);
    evento.preventDefault();
  }
}








/**/
