<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Formulário</title>
</head>
<body>

  <h1>Aleatório</h1>

  <form name="form1" action="" method="POST">

    <p>
      Número mínimo:
      <input name="min" type="number" />
    </p>

    <p>
      Número máximo:
      <input name="max" type="number" />
    </p>

    <p>
      Quantidade:
      <input name="qtd" type="number" />
    </p>

    <p>
      <input type="submit" value="Calcular" />
    </p>
  </form>

  <div id="saida">
    <?php
    if ($_POST) {
      $min = (int) $_POST['min'];
      $max = (int) $_POST['max'];
      $qtd = (int) $_POST['qtd'];

      $params = http_build_query(array(
        'min' => $min,
        'max' => $max,
        'qtd' => $qtd,
      ));
      $url = "http://127.0.0.1:8887/servicos-ws/aleatorios-ws.php";
      $url .= "?" . $params;

      $retorno = file_get_contents($url);
      $dados = json_decode($retorno, true);

      //$numeros = join('/', $dados['numeros']);
      //echo $numeros;

      ?>
      <ul>
        <?php
        foreach($dados['numeros'] as $n) {
          ?>
          <li><?php echo $n; ?></li>
          <?php
        }
        ?>
      </ul>
      <?php
    }
    ?>
  </div>
  
</body>
</html>
