<?php

require '../config.php';

$categoria = $_POST['categoria'];

$vo = new Application_Model_Vo_Categoria();
$vo->setCategoria($categoria);

$model = new Application_Model_Categoria();
$model->salvar($vo);

$tb = new Application_Model_DbTable_Categoria();

$retorno = $tb->fetchRow("idcategoria = " . $vo->getIdcategoria());
$retorno = $retorno->toArray();

$retorno['idcategoria'] = (int) $retorno['idcategoria'];

echo json_encode($retorno);









