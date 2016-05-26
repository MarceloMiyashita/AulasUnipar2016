<?php

$string = "09/05/2016";
$pedacos = explode('/', $string);

$dataComputador = implode('-', $pedacos);

echo $dataComputador;
