<?php
$f = (int) $_GET['f'];

$c = ($f - 32) / 1.8;

echo json_encode(array(
  'celcius' => $c
));
