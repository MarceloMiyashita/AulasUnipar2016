<?php
$min = (int) $_GET['min'];
$max = (int) $_GET['max'];

$numero = mt_rand($min, $max);

echo json_encode(array(
  'numero' => $numero
));
