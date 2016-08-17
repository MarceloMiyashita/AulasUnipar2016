<?php
require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msg = array();

$cliente = '';
$email = '';
$cpf = '';
$idcidade = 0;

if ($_POST) {
  $cliente = $_POST['cliente'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $idcidade = (int) $_POST['cidade'];

  if ($cliente == '') {
    $msg[] = 'Informe o nome do cliente.';
  }

  if (!cpf($cpf)) {
    $msg[] = 'Informe um CPF válido.';
  } else {
    $sql = "Select idcliente, nome
    From cliente Where cpf = '$cpf'";
    $resultado = mysqli_query($con, $sql);
    $linha = mysqli_fetch_assoc($resultado);

    if ($linha) {
      $msg[] = "CPF já cadastrado para " . $linha['nome'];
    }
  }

  if ($idcidade <= 0) {
    $msg[] = 'Selecione uma cidade';
  } else {
    $sql = "Select idcidade From cidade
    Where idcidade = $idcidade";
    $resultado = mysqli_query($con, $sql);
    $linha = mysqli_fetch_assoc($resultado);

    if (!$linha) {
      $msg[] = 'Cidade inexistente';
    }
  }

  if (!$msg) {
    $situacao = CLIENTE_ATIVO;
    $sql = "Insert Into cliente
    (nome, email, situacao, idcidade, cpf)
    Values
    ('$cliente', '$email', '$situacao', $idcidade, '$cpf')";

    $resultado = mysqli_query($con, $sql);
    $idcliente = mysqli_insert_id($con);

    $url = "clientes-editar.php?idcliente=" . $idcliente;

    header("location:$url");
    exit;
  }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar cliente</title>

    <?php headCss(); ?>
  </head>
  <body>

    <?php include 'nav.php'; ?>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-heart"></i> Cadastrar cliente</h1>
          </div>
        </div>
      </div>

      <?php
      if ($msg) {
          msgHtml($msg);
      }
      ?>

      <form class="row" role="form" method="post" action="clientes-cadastrar.php">
        <div class="col-xs-12">

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
                <input type="text" class="form-control" id="fcpf" name="cpf" placeholder="Somente números" maxlength="11" value="<?php echo $cpf; ?>">
              </div>
            </div>
            <div class="col-xs-6">
              <div class="form-group">
                <label for="fcidade">Cidade</label>
                <select class="form-control" id="fcidade" name="cidade">
                  <option value="">--</option>
                  <?php
                  $sql = "Select idcidade, cidade, uf From cidade Order By cidade";
                  $resultado = mysqli_query($con, $sql);
                  while($linha = mysqli_fetch_assoc($resultado)) {
                  ?>
                  <option value="<?php echo $linha['idcidade']; ?>"
                    <?php if ($idcidade == $linha['idcidade']) { ?> selected<?php } ?>
                    >
                    <?php echo $linha['cidade']; ?>
                    /
                    <?php echo $linha['uf']; ?>
                  </option>
                  <?php
                  }
                  ?>
                </select>
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
