$(window).ready(function(){
  $('#form1').submit(salvarDados);
});

function salvarDados(e) {
  e.preventDefault();

  $('#loading').show();
  $.ajax({
    method: 'POST',
    url: "server3.php",
    data: {
      'valorTotal': $('#total').val()
    }
  })
  .done(salvarDadosOk)
  .error(function(ajax) {
    $('#loading').hide();

    var data = ajax.responseText.split("|");
    console.log(data);
    window.alert('Erro: ' + data[2]);
  });
}

function salvarDadosOk(data) {
  $('#loading').hide();

  window.alert('Id: ' + data.data.id)
}
