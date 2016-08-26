<?php

require '../config.php';

require DIRETORIO_SLIM . '/Slim/Slim.php';

$app = new \Slim\Slim();

function saida($dados, $erro = 0, $httpStatus = 200) {
  if (($erro > 0) and ($httpStatus == 200)) {
    $httpStatus = 400;
  }

  $saida = array(
    'dados' => $dados,
    'erro' => $erro
  );

  $app = \Slim\Slim::getInstance();
  $app->response->setStatus($httpStatus);
  $app->response->headers->set('Content-Type', 'application/json');
  $app->response->write(json_encode($saida));
}

$app->get('/', function() use ($app) {
    saida('Método não implementado', 1);
});

$app->get('/estados', function () use ($app) {
  $con = Conexao::getInstance();

  $sql = 'Select * From uf';
  $ufQuery = $con->query($sql);

  $saida = array();
  while ($linha = $ufQuery->fetch(PDO::FETCH_ASSOC)) {
    $linha['iduf'] = (int) $linha['iduf'];
    $saida[] = $linha;
  }

  saida($saida);
});

$app->get('/cidades/:iduf', function () use ($app) {
  
});

$app->run();
sleep(1);
