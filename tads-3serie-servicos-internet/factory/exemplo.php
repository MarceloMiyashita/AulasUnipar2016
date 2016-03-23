<?php

require 'Pizza.php';
require 'BaconPizza.php';
require 'CalabresaPizza.php';
require 'Pizzaria.php';

$pizzaria = new Pizzaria();
$pizza = $pizzaria->factory(2, 'Borda Recheada', 'G');