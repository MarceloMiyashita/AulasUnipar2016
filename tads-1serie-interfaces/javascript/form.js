window.onload = function() {
  document.getElementById('frm')
    .addEventListener('submit', frmSubmit);
}

function frmSubmit(evento) {
  // var fnome = document.getElementById('nome');
  var fnome = document.querySelector('#nome');
  var nome = fnome.value;
  if (nome == '') {
    window.alert('Nome deve ser preenchido.');
    evento.preventDefault();
    return false;
  }
  if (nome.length < 5) {
    window.alert('Informe o nome completo.');
    evento.preventDefault();
    return false;
  }
  if (nome.indexOf(' ') <= 0) {
    window.alert('Informe o nome completo.');
    evento.preventDefault();
    return false;
  }

  var fcpf = document.getElementById('cpf');
  var cpf = fcpf.value;
  if (cpf.length != 11) {
    window.alert('Informe o CPF sem pontuação.');
    evento.preventDefault();
    return false;
  }
  if (!TestaCPF(cpf)) {
    window.alert('Informe um CPF correto.');
    evento.preventDefault();
    return false;
  }

  var fsenha = document.getElementById('senha');
  var senha = fsenha.value;
  if (senha == '') {
    window.alert('Senha deve ser preenchida.');
    evento.preventDefault();
    return false;
  }

  var fsenha2 = document.getElementById('senha2');
  var senha2 = fsenha2.value;
  if (senha != senha2) {
    window.alert('A confirmação da senha deve ser igual a senha.');
    evento.preventDefault();
    return false;
  }
}








/**/
