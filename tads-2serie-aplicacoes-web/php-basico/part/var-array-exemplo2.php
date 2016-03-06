<?php
$a = array(1,2,'a','b');

echo $a[0]; // 1
echo $a[2]; // a

$a[2] = 'c';
echo $a[2]; // c

$a[4] = 'd';

// Array ( [0] => 1 [1] => 2 [2] => c
//   [3] => b [4] => d )
print_r($a);