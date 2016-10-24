$(window).ready(telaPronta);

function telaPronta() {
  carregarUfs();

  $('#ufSelect').on('change', carregarCidades)
}

function carregarUfs() {
  var url = './api/estados';
  $.get(url)
  .done(ufsCarregados);
}

function ufsCarregados(dados) {
  var modelo = '<option value="valor">texto</option>';
  var html = modelo
      .replace('valor', '')
      .replace('texto', 'Selecione uma UF')
  ;

  for (var i in dados.dados) {
    var uf = dados.dados[i];

    html += modelo
      .replace('valor', uf.iduf)
      .replace('texto', uf.uf);
  }

  $('#ufSelect').html(html);
}

function carregarCidades() {
  var iduf = $('#ufSelect').val();

  if (iduf == '') {
    $('#cidSelect').html('');
    return ;
  }

  var url = './api/cidades/' + iduf;

  $('#loading').show();
  $.get(url).done(cidadesCarregadas);
}

function cidadesCarregadas(dados) {
  var modelo = '<option value="valor">texto</option>';

  var html = modelo
    .replace('valor', '')
    .replace('texto', 'Selecione uma cidade');

  for (var i in dados.dados) {
    var cidade = dados.dados[i];

    html += modelo
      .replace('valor', cidade.idcidade)
      .replace('texto', cidade.cidade);
  }

  $('#cidSelect').html(html);
  $('#loading').hide();
}












/**/
