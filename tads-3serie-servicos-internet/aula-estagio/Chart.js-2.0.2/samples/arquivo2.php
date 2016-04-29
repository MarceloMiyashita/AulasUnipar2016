<?php

$pdo = new PDO('sqlite:D:\\chiquitto\\graficos');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*$select = $pdo->query("SELECT
Sum(valor) soma,
(strftime('%m', data) || '/' || strftime('%Y', data)) as mes
FROM vendas
Group By strftime('%m', data), strftime('%Y', data)
Order By strftime('%Y', data), strftime('%m', data)");
$r = $select->fetchAll(PDO::FETCH_ASSOC);*/

$select = $pdo->query("SELECT
Sum(valor) soma,
strftime('%m', data) mes,
strftime('%Y', data) ano
FROM vendas
Group By mes, ano
Order By ano, mes");

$labels = array();
$valores = array();
while($row = $select->fetch(PDO::FETCH_ASSOC)) {
  /*$r[] = array(
    'soma' => $row['soma'],
    'mes' => $row['mes'] . '/' . $row['ano']
  );*/

  $labels[] = $row['mes'] . '/' . $row['ano'];
  $valores[] = (float) $row['soma'];
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Vendas</title>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../dist/Chart.js"></script>
</head>

<body>
  <div id="container" style="width: 75%;">
    <canvas id="canvas"></canvas>
  </div>

  <script>
    window.onload = function() {
      var ctx = document.getElementById("canvas").getContext("2d");

      var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: <?php echo json_encode($valores); ?>,
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
            }],
            labels: <?php echo json_encode($labels); ?>
        },
        options: {
            responsive: true
        }
    };

      new Chart(ctx, config);
    }
  </script>
</body>

</html>
