<?php

require './protege.php';
require './config.php';
require './lib/funcoes.php';
require './lib/conexao.php';

$msgOk = array();
$msgAviso = array();

$idvenda = $_SESSION['idvenda'];
$acao = 0;
if (isset($_POST['acao'])) {
  $acao = (int) $_POST['acao'];
} elseif (isset($_GET['acao'])) {
  $acao = (int) $_GET['acao'];
}

if ($acao == 1) {
  $idproduto = (int) $_POST['idproduto'];
  $qtd = (int) $_POST['qtd'];
  $precoPago = (float) $_POST['preco'];

  $sql = "Select preco From produto
  Where (idproduto = $idproduto)
  And (status = '" . PRODUTO_ATIVO . "')";
  $consulta = mysqli_query($con, $sql);
  $produto = mysqli_fetch_assoc($consulta);
  if ($produto) {
    $preco = $produto['preco'];

    $sql = "Insert Into vendaitem
    (idproduto, idvenda, preco, precopago, qtd) Values
    ($idproduto, $idvenda, $preco, $precoPago, $qtd)
    On duplicate key Update
    precopago = $precoPago, qtd = $qtd";
    mysqli_query($con, $sql);
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos da venda</title>

    <?php headCss(); ?>
  </head>
  <body>

<?php include 'nav.php'; ?>

<div class="container">

<div class="page-header">
  <h1><i class="fa fa-shopping-cart"></i> Andamento da venda #<?php echo $idvenda; ?></h1>
</div>

<?php if ($msgOk) { msgHtml($msgOk, 'success'); } ?>
<?php if ($msgAviso) { msgHtml($msgAviso, 'warning'); } ?>

<form role="form" method="post" action="venda-produto.php">

  <input type="hidden" name="acao" value="1">

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Adicionar produto</h3>
    </div>

    <div class="panel-body">

      <div class="container-fluid">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="form-group">
              <label for="fidproduto">Produto</label>
              <select id="fidproduto" name="idproduto" class="form-control" required>
                <option value="">Selecione um produto</option>

                <?php
$sql = "SELECT idproduto, produto, preco
FROM produto
WHERE STATUS = '" . PRODUTO_ATIVO . "'
ORDER BY produto";
$consulta = mysqli_query($con, $sql);
while($linha = mysqli_fetch_assoc($consulta)) {
                ?>
                <option value="<?php echo $linha['idproduto']; ?>"><?php echo $linha['produto'];?> (R$ <?php echo number_format($linha['preco'], 2, ",", "."); ?>)</option>
<?php } ?>
              </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-3 col-md-2">
            <div class="form-group">
              <label for="fqtd">Quantidade</label>
              <input type="number" class="form-control" id="fqtd" value="0" name="qtd" min="1" required>
            </div>
          </div>

          <div class="col-xs-12 col-sm-3 col-md-2">
            <div class="form-group">
              <label for="fpreco">Preço unitário</label>
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control" id="fpreco" name="preco" required>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="panel-footer">
      <button type="submit" class="btn btn-primary">Inserir</button>
      <button type="reset" class="btn btn-danger">Limpar</button>
    </div>
  </div>
</form>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Produtos da venda</h3>
  </div>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Qtd.</th>
        <th>Produto</th>
        <th>Preço unitário</th>
        <th>Preço total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT
vi.idproduto,
vi.qtd,
vi.precopago,
p.produto
FROM vendaitem vi
INNER JOIN produto p
ON p.idproduto = vi.idproduto
Where (vi.idvenda = $idvenda)";

$consulta = mysqli_query($con, $sql);
$total = 0;

while($linha = mysqli_fetch_assoc($consulta)) {
  $qtd = (int) $linha['qtd'];
  $precoPago = (float) $linha['precopago'];
  $subtotal = $qtd * $precoPago;
  $total += $subtotal;
?>
      <tr>
        <td><?php echo $qtd; ?></td>
        <td><?php echo $linha['produto']; ?></td>
        <td>R$ <?php echo number_format($precoPago, 2); ?></td>
        <td>R$ <?php echo number_format($subtotal, 2); ?></td>
        <td><a href="venda-produto.php?acao=2&idproduto={{IDPRODUTO}}" title="Remover produto da venda"><i class="fa fa-times fa-lg"></i></a></td>
      </tr>
<?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th colspan="2">Total da venda</th>
        <th>R$ <?php echo number_format($total, 2); ?></th>
        <th></th>
      </tr>
    </tfoot>
  </table>
</div>

<form class="form-horizontal" method="post" action="venda-fechar.php">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Fechamento da venda</h3>
  </div>

  <div class="panel-body">

    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Código:</label>
      <div class="col-sm-2">
        <p class="form-control-static">{{IDVENDA}}</p>
      </div>

      <label for="fcliente" class="col-sm-2 control-label">Data:</label>
      <div class="col-sm-2">
          <p class="form-control-static">{{DATA}}</p>
      </div>

      <label for="fcliente" class="col-sm-2 control-label">Total:</label>
      <div class="col-sm-2">
        <p class="form-control-static">{{VENDA_TOTAL}}</p>
      </div>
    </div>

    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Cliente:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{CLIENTE_NOME}}</p>
      </div>

      <label for="fcliente" class="col-sm-2 control-label">CPF:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{CLIENTE_CPF}}</p>
      </div>
    </div>

    <div class="form-group">
      <label for="fcliente" class="col-sm-2 control-label">Vendedor:</label>
      <div class="col-sm-4">
        <p class="form-control-static">{{USUARIO_NOME}}</p>
      </div>
    </div>

  </div>

  <div class="panel-footer">
    <button type="submit" class="btn btn-success">Fechar venda</button>
  </div>
</div>
</form>

</div>

<script src="./lib/jquery.js"></script>
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
