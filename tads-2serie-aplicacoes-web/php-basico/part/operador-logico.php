<?php

$t = true;
$f = false;

$c = ($t and $f); // false
$c = ($t or $f); // true
$c = ($t xor $f); // true

$c = !$t; // false
$c = !$f; // true