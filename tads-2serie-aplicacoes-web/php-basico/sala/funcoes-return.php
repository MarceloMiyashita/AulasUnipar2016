<?php

function maior($a, $b) {
  if ($a > $b) {
    return $a;
  }
  return $b;
}

$valorMaior = maior(7, 14);
$valorMaiorAinda = maior($valorMaior, 21);
echo "Valor maior = $valorMaiorAinda";