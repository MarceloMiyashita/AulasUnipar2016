<?php
$pos = array(
	array('x'=>10,'y'=>15),
	array('x'=>20,'y'=>30),
);

echo $pos[0]['x']; // 10
echo $pos[1]['x']; // 20

/* Array (
  [0] => Array ( [x] => 10 [y] => 15 )
  [1] => Array ( [x] => 20 [y] => 30 )
) */
print_r($pos);