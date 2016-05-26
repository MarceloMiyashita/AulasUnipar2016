$(window).ready(function(){
  carregarDados();
});

function carregarDados() {
  $.ajax({
    method: 'GET',
    url: "server1.php",
    data: {}
  })
  .done(dadosCarregados);
}

function dadosCarregados(data) {
  var template = "<p>{id}: {valor}</p>";

  var html = '';
  for(var i in data) {
    html += template
    .replace('{id}', data[i].id)
    .replace('{valor}', data[i].valor)
    ;
  }

  $('#loading').hide();
  $('#out').html(html);
}
