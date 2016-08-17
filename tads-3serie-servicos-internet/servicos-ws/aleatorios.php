<?php
$min = (int) $_GET['min'];
$max = (int) $_GET['max'];
$qtd = (int) $_GET['qtd'];

$numeros = array();

for ($i = 0; $i < $qtd; $i++) {
  $numeros[] = mt_rand($min, $max);
}

echo json_encode(array(
  'numeros' => $numeros
));
