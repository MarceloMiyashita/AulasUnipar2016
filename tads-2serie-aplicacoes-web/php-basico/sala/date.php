<?php

//echo date('d/m/Y');

$timestamp = mktime(0,0,0,10,12,2000);
//echo date('d/m/Y', $timestamp);

$amanha = strtotime('+1year', $timestamp);
echo date('c', $amanha);
