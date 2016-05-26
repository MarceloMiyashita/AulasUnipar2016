<?php

$string = '000.111';
$r = strtr($string, array(
  '0' => '2',
  '1' => '3',
  '.' => ''
));
echo $r;
