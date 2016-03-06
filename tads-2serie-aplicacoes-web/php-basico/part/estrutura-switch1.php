<?php

$n = 2;

switch($n) {
  case 2:
  case 4:
    echo 'par';
    break;
  case 1:
  case 3:
    echo 'impar';
    break;
  default:
    echo 'desconhecido';
}