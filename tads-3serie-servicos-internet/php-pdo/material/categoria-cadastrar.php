<?php

require 'config.php';
require 'Conexao.php';

$con = Conexao::getInstance();

$categoria = 'Categoria ' . date('d/m/Y H:i:s');

// Sem prepared statement
$sql = "Insert Into categoria (categoria) Values ('$categoria')";
$consulta = $con->exec($sql);

// Com prepared statement
$sql = 'Insert Into categoria (categoria) Values (:categoria)';
$stmt = $con->prepare($sql);
$stmt->bindValue(':categoria', $categoria);
$stmt->execute();
