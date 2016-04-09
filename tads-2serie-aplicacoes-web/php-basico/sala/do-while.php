<?php

$i = 0;
$n = 0;
do {
	echo $n . '-';

	$i++;
	$n += 3;
} while ($i < 10);

$i = 0;
do {
	echo ($i * 3) . '-';

	$i++;
} while ($i < 10);

////////////////////////////////////////////

$i = 0;
$a = array();
do {
	$a[$i] = $i * 3;

	$i++;
} while ($i < 10);
print_r($a);
