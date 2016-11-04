<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';


$data = date('Y-m-d');
$idcliente = (int) $_GET['idcliente'];
$status = VENDA_ABERTA;
$idusuario = $_SESSION['idusuario'];

$sql = "Insert Into venda (data, idcliente, status, idusuario)
Values ('$data', $idcliente, '$status', $idusuario)";
$query = mysqli_query($con, $sql);

$idvenda = mysqli_insert_id($con);
$_SESSION['idvenda'] = $idvenda;

header('location:venda-produto.php');
