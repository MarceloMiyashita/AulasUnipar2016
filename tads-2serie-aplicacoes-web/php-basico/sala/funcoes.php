<?php

function numerosPares() {
  $i = 1;
  while ($i <= 10) {
    if ($i % 2 == 0) {
      echo $i;
    }
    $i++;
  }
}

function pares1eMax($max) {
  $i = 1;
  while ($i <= $max) {
    if ($i % 2 == 0) {
      echo $i;
    }
    $i++;
  }
}

function paresMinMax($max, $min) {
  $i = $min;
  while ($i <= $max) {
    if ($i % 2 == 0) {
      echo $i;
    }
    $i++;
  }
}

//numerosPares();
//pares1eMax(20);
paresMinMax(10, 5);
