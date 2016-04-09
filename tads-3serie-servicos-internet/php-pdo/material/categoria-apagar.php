<?php

require 'config.php';
require 'Conexao.php';

$con = Conexao::getInstance();

$sql = "Delete From categoria
Where idcategoria = :idcategoria";

$st = $con->prepare($sql);

$st->bindValue(':idcategoria', 1);
$st->execute();

$st->bindValue(':idcategoria', 2);
$st->execute();
