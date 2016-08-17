<?php
$n = (int) $_GET['n'];

$resultado = $n * $n;

echo json_encode(array(
  'resultado' => $resultado
));
