<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$idvenda = $_SESSION['idvenda'];
$status = VENDA_FECHADA;

$sql = "Update venda Set status='$status'
Where idvenda = $idvenda";
mysqli_query($con, $sql);

unset($_SESSION['idvenda']);

header('location:vendas.php');




//
