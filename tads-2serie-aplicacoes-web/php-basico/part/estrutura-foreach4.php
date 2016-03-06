<?php


$uf = array(
	'PR' => array('nome' => 'Parana', 'capital' => 'Curitiba'),
	'AM' => array('nome' => 'Amazonas', 'capital' => 'Manaus'),
);

/*
Capital PR = Curitiba
Capital AM = Manaus
*/
foreach ($uf as $k => $v) {
	echo "Capital $k = " . $v['capital'];
}