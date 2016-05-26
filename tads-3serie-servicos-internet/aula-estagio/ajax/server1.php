<?php

$pdo = new PDO('sqlite:./graficos.sqlite.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$select = $pdo->query("SELECT id, data, valor FROM vendas");
$dados = $select->fetchAll(PDO::FETCH_ASSOC);

sleep(2);

header('content-type:application/json;charset=utf-8');
echo json_encode($dados);
