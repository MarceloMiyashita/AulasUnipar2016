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

$app->get('/cidades/:iduf', function ($iduf) use ($app) {
  $sql = "Select idcidade, cidade
      From cidade
      Where (iduf = $iduf)";
  
  $con = Conexao::getInstance();
  $consulta = $con->query($sql);
  
  $saida = array();
  while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $linha['idcidade'] = (int) $linha['idcidade'];
      $saida[] = $linha;
  }
  
  saida($saida);
});

// Metodo que recebe uma string e faz uma busca pelo nome da cidade,
// e retorna a lista das cidades encontradas
$app->get('/buscacidades/:nome', function($nome) {
    $sql = "Select idcidade, iduf, cidade From cidade
        Where (cidade LIKE '%$nome%')";
    
    $con = Conexao::getInstance();
    $consulta = $con->query($sql);
    
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $linha['idcidade'] = (int) $linha['idcidade'];
        $linha['iduf'] = (int) $linha['iduf'];
        $dados[] = $linha;
    }
    saida($dados);
});

$app->get('/buscacidades/uf/:uf', function($uf) {
    $sql = "Select
    c.idcidade, c.iduf, c.cidade
From cidade c
Inner Join uf u On u.iduf = c.iduf
Where u.uf = '$uf'";
    
    $con = Conexao::getInstance();
    $consulta = $con->query($sql);
    
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $linha['idcidade'] = (int) $linha['idcidade'];
        $linha['iduf'] = (int) $linha['iduf'];
        $dados[] = $linha;
    }
    saida($dados);
});

$app->run();
sleep(1);
