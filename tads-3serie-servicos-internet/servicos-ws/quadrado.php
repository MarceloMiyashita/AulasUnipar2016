<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Formulário</title>
</head>
<body>

  <h1>Quadrado</h1>

  <form name="form1" action="" method="POST">

    <p>
      Numero:
      <input name="n" type="number" />
    </p>

    <p>
      <input type="submit" value="Calcular" />
    </p>
  </form>

  <div id="saida">
    <?php
    if ($_POST) {
      $n = $_POST['n'];
      $url = "http://127.0.0.1:8887/servicos-ws/quadrado-ws.php?n=" . $n;
      $retorno = file_get_contents($url);
      $dados = json_decode($retorno, true);

      echo "O quadrado de $n é " . $dados['resultado'];
    }
    ?>
  </div>
  
</body>
</html>
