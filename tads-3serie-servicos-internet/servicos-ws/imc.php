<?php
$altura = (int) $_GET['altura'];
$altura = $altura / 100;

$peso = (int) $_GET['peso'];
$imc = $peso / ($altura * $altura);

if ($imc < 17) {
  $texto = 'Muito abaixo do peso';
} else if ($imc < 20) {
  $texto = 'Abaixo do peso';
} else if ($imc < 25) {
  $texto = 'Peso ideal';
} else if ($imc < 30) {
  $texto = 'Sobrepeso';
} else {
  $texto = 'Obesidade grau 1';
}

echo json_encode(array(
  'imc' => $imc,
  'texto' => $texto
));





/**/
