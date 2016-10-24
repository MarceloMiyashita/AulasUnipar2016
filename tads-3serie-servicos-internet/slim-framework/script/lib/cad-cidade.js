$(window).ready(janelaPronta);

function janelaPronta(evento) {
  carregarUf();

  $('#frmCidade').on('submit', cadastrarCidade);
}

function carregarUf() {
  $('#loading').show();

  var r = $.get('./api/estados');
  r.done(renderUf);
}

function renderUf(dados) {
  var modelo = '<option value="valor">texto</option>';

  var html = '';

  html += modelo
            .replace('valor', '')
            .replace('texto', 'Selecione ...');

  for(var i = 0; i < dados.dados.length; i++) {
    var uf = dados.dados[i];

    html += modelo
              .replace('valor', uf.iduf)
              .replace('texto', uf.uf);
  }

  $('#ufSelect').html(html);
  $('#loading').hide();
}

function cadastrarCidade(evento) {
  evento.preventDefault();

  $('#loading').show();

  var iduf = $('#ufSelect').val();
  var cidade = $('#iCidade').val();
  var pop = $('#iPopulacao').val();

  var r = $.post('./api/cidade', {
    "iduf": iduf,
    "cidade": cidade,
    "populacao": pop
  });

  r.done(cidadeCadastrada);
}

function cidadeCadastrada(dados) {
  $('#loading').hide();
  $('#frmCidade').get(0).reset();
  window.alert('Cidade cadastrada');
}














/**/
