<?php

require './protege.php';
require './config.php';
require './lib/conexao.php';
require './lib/funcoes.php';

$idcliente = (int) $_GET['idcliente'];

/*$sql = "Select idvenda From venda
Where idcliente = $idcliente";
$consulta = mysqli_query($con, $sql);
$venda = mysqli_fetch_assoc($consulta);
if ($venda) {
  javascriptAlertFim("Cliente não pode ser apagado porque possui vendas", "clientes.php");
}*/

$sql = "Select Count(*) contador
From venda Where idcliente = $idcliente";
$consulta = mysqli_query($con, $sql);
$linha = mysqli_fetch_assoc($consulta);
if ($linha['contador'] > 0) {
  javascriptAlertFim("Cliente não pode ser apagado porque possui vendas", "clientes.php");
}

$sql = "Delete From cliente Where idcliente = $idcliente";
mysqli_query($con, $sql);

javascriptAlertFim("Registro apagado", "clientes.php");
