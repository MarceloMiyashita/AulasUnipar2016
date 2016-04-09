<?php

require 'config.php';
require 'Conexao.php';

$con = Conexao::getInstance();
$sql = "select * from post order by idcategoria";
$retorno = $con->query($sql);

while ($linha = $retorno->fetch()){
	print_r($linha);
}

$stmt = $con->prepare($sql);
$stmt->execute();

while ($linha = $stmt->fetch()){
	print_r($linha);
}