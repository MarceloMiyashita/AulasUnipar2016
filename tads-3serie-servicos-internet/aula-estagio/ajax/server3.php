<?php

function saida($data, $error = 0, $errorMsg = '') {
  $txt = "$data|$error|$errorMsg";

  if ($error != 0) {
    header("Status: 400 Invalid request", true, 400);
  }

  header('content-type:application/json;charset=utf-8');
  echo $txt;
}

$valor = $_POST['valorTotal'];

if ($valor == 115) {
  saida(null, 1, "Valor $valor esta repetido");
  exit;
}

$pdo = new PDO('sqlite:./graficos.sqlite.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "Insert Into vendas (data, valor) Values
(:data, :valor)";

$st = $pdo->prepare($sql);
$st->bindValue(':data', date('Y-m-d'));
$st->bindValue(':valor', $valor);
$st->execute();

$id = $pdo->lastInsertId();

saida($id);
