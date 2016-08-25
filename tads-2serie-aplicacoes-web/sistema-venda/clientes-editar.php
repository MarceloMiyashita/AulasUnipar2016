<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

if ($_POST) {
  $idcliente = (int) $_POST['idcliente'];
} else {
  $idcliente = (int) $_GET['idcliente'];
}

$sql = "Select
  nome, email, situacao, idcidade, cpf
  From cliente
  Where idcliente = $idcliente";
$resultado = mysqli_query($con, $sql);
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
  echo "Registro inexistente";
  exit;
}

if ($_POST) {
  $cliente = $_POST['cliente'];
  $email = $_POST['email'];

  if (isset($_POST['ativo'])) {
    $situacao = CLIENTE_ATIVO;
  } else {
    $situacao = CLIENTE_INATIVO;
  }

  $idcidade = $_POST['cidade'];
  $cpf = $_POST['cpf'];

  if ($cliente == '') {
    $msg[] = 'Informe o nome completo';
  }

  if ($email == '') {
    $msg[] = 'Informe o endereço de email';
  } else {
    $sql = "Select idcliente From cliente
    Where (email = '$email') And (idcliente != $idcliente)";
    $resultado = mysqli_query($con, $sql);
    $linha = mysqli_fetch_assoc($resultado);

    if ($linha) {
      $msg[] = 'Email já existe pra outro cliente';
    }
  }

  if (!$msg) {
    $sql = "Update cliente Set
    nome = '$cliente',
    email = '$email',
    situacao = '$situacao',
    idcidade = $idcidade,
    cpf = '$cpf'
    Where idcliente = $idcliente";

    $resultado = mysqli_query($con, $sql);

    //header("location:clientes.php");
    //exit;

    $mensagem = "Registro salvo";
    $url = "clientes.php";
    javascriptAlertFim($mensagem, $url);
  }

} else {
  $cliente = $linha['nome'];
  $email = $linha['email'];
  $situacao = $linha['situacao'];
  $idcidade = $linha['idcidade'];
  $cpf = $linha['cpf'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar cliente</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-heart"></i> Editar cliente #<?php echo $idcliente; ?></h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="clientes-editar.php">
        <div class="col-xs-12">

          <input type="hidden" name="idcliente" value="<?php echo $idcliente; ?>">

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcliente">Cliente</label>
                <input type="text" class="form-control" id="fcliente" name="cliente" placeholder="Nome completo" value="<?php echo $cliente; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="femail">Email</label>
                <input type="text" class="form-control" id="femail" name="email" value="<?php echo $email; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcpf">CPF</label>
                <input type="text" class="form-control" id="fcpf" name="cpf" placeholder="Somente números" maxlength="11"  value="<?php echo $cpf; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcidade">Cidade</label>
                <select class="form-control" id="fcidade" name="cidade">
                  <?php
                  $sql = "Select idcidade, cidade
                  From cidade
                  Order By cidade";
                  $resultado = mysqli_query($con, $sql);
                  while ($linha = mysqli_fetch_assoc($resultado)) {
                  ?>
                  <option
                  value="<?php echo $linha['idcidade']; ?>"
                  <?php if ($idcidade == $linha['idcidade']) { ?>selected<?php } ?>
                  >
                  <?php echo $linha['cidade']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="checkbox">
                <label for="fativo">
                  <input type="checkbox" name="ativo" id="fativo"
                  <?php if ($situacao == CLIENTE_ATIVO) { ?>checked<?php } ?>
                  >
                  Cliente ativo
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          </div>
        </div>
      </form>

    </div>

    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
