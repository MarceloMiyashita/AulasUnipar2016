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

  $app->response->setStatus($httpStatus);
  $app->response->headers->set('Content-Type', 'application/json');
  $app->response->write(json_encode($saida));
}

$app->get('/', function() use ($app) {
    saida('Método não implementado', 1);
});

$app->get(
        '/estados', function () use ($app) {
    $con = Conexao::getInstance();

    $sql = 'Select * From uf';
    $ufQuery = $con->query($sql);
    $ufArray = $ufQuery->fetchAll(PDO::FETCH_ASSOC);

    saida($ufArray);
}
);

$app->get(
        '/cidades/:iduf', function ($iduf) use ($app) {

    $con = Conexao::getInstance();
    $sql = 'SELECT * FROM cidade where iduf = :iduf';

    $statement = $con->prepare($sql);
    $statement->bindValue(':iduf', $iduf, PDO::PARAM_STR);
    $statement->execute();

    $cidades = $statement->fetchAll(PDO::FETCH_ASSOC);

    saida($cidades);
}
);

$app->run();
sleep(1);
