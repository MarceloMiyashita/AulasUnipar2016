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

$app->post('/uf', function(){
    $app = \Slim\Slim::getInstance();
    
    $uf = $app->request->params('uf');
    
    $sql = "Insert Into uf (uf) Values (:uf)";
    
    $con = Conexao::getInstance();
    
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':uf', $uf);
    
    if (!$preparado->execute()) {
        saida(array(
            'uf' => $uf
        ), 1);
    }
    
    $sql = "Select iduf, uf From uf Where iduf = :iduf";
    
    $iduf = (int) $con->lastInsertId();
    
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':iduf', $iduf);
    $preparado->execute();
    
    $saida = $preparado->fetch(PDO::FETCH_ASSOC);
    
    saida($saida);
});

$app->post('/cidade', function() {
    $app = \Slim\Slim::getInstance();
    $con = Conexao::getInstance();
    
    $cidade = $app->request->params('cidade');
    $iduf = (int) $app->request->params('iduf');
    
    $sql = "Insert Into cidade (iduf, cidade) Values
        (:iduf, :cidade)";
    
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':iduf', $iduf);
    $preparado->bindValue(':cidade', $cidade);
    
    try {
        $preparado->execute();
    } catch (Exception $exc) {
        saida($app->request->params(), 2);
        return;
    }
    
    $idcidade = (int) $con->lastInsertId();
    
    $sql = "Select idcidade, iduf, cidade From cidade
        Where idcidade = :idcidade";
    
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':idcidade', $idcidade);
    $preparado->execute();
    
    $saida = $preparado->fetch(PDO::FETCH_ASSOC);
    
    saida($saida);
});

$app->post('/uf/:iduf', function($iduf) {
    $sql = "Select iduf From uf Where iduf = :iduf";
    
    $con = Conexao::getInstance();
    
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':iduf', $iduf);
    $preparado->execute();
    
    $uf = $preparado->fetch();
    if (!$uf) {
        saida(array(), 3, 404);
    }
    
    $app = \Slim\Slim::getInstance();
    
    $uf = $app->request->params('uf');
    
    $sql = "Update uf Set uf = :uf
        Where iduf = :iduf";
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':iduf', $iduf);
    $preparado->bindValue(':uf', $uf);
    
    try {
        $preparado->execute();
    } catch (Exception $exc) {
        saida($app->request->params(), 4);
    }
    
    $sql = "Select uf From uf Where iduf = :iduf";
    $preparado = $con->prepare($sql);
    $preparado->bindValue(':iduf', $iduf);
    $preparado->execute();
    
    $ufLinha = $preparado->fetch(PDO::FETCH_ASSOC);
    
    saida(array(
        'iduf' => $iduf,
        'uf' => $ufLinha['uf']
    ));
});

$app->run();
sleep(1);










