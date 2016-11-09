<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

// Verificar se a venda existe
$idvenda = (int) $_GET['idvenda'];
$sql = "Select status From venda
Where idvenda = $idvenda";
$resultado = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($resultado);

if (!$venda) {
  javascriptAlertFim('Venda inexistente', 'vendas.php');
}

// Verificar se a venda esta aberta
if ($venda['status'] == VENDA_FECHADA) {
  javascriptAlertFim('Venda esta fechada', 'vendas.php');
}

// Atribuir na sessao o idvenda
$_SESSION['idvenda'] = $idvenda;
header('location:venda-produto.php');





//
