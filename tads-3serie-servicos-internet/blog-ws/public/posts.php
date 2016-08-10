<?php

require '../config.php';

$tb = new Application_Model_DbTable_Post();
$postagens = $tb->fetchAll();

$saida = array();

foreach ($postagens as $postagem) {
    $saida[] = array(
        'idpost' => (int) $postagem['idpost'],
        'idcategoria' => (int) $postagem['idcategoria'],
        'idadmin' => (int) $postagem['idadmin'],
        'titulo' => $postagem['titulo'],
        'texto' => $postagem['texto']
    );
}

echo json_encode($saida);