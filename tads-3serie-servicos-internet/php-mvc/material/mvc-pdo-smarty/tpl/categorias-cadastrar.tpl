<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar categoria</title>

    {include file='css.tpl'}
  </head>
  <body>

    {include file='nav.tpl'}

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-cubes"></i> Cadastrar categoria</h1>
          </div>
        </div>
      </div>
        
      {include file='msg.tpl'}

      <form class="row" role="form" method="post" action="categorias-cadastrar.php">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="fcategoria">Categoria</label>
                <input type="text" class="form-control" id="fcategoria" name="categoria" placeholder="Nome da categoria" value="{$valores.categoria}">
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

    {include file='javascript.tpl'}

  </body>
</html>