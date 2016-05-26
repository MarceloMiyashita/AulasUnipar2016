$(window).ready(function(){
  $('#form1').submit(salvarDados);
});

function salvarDados(e) {
  e.preventDefault();

  $('#loading').show();
  $.ajax({
    method: 'POST',
    url: "server2.php",
    data: {
      'valorTotal': $('#total').val()
    }
  })
  .done(salvarDadosOk)
  .error(function(ajax) {
    $('#loading').hide();

    var data = ajax.responseJSON;
    window.alert('Erro: ' + data.errorMsg);
  });
}

function salvarDadosOk(data) {
  $('#loading').hide();

  window.alert('Id: ' + data.data.id)
}
