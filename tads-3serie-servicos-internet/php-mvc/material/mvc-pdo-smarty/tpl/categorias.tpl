<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>

    {include file='css.tpl'}
  </head>
  <body>

    {include file='nav.tpl'}

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1><i class="fa fa-cubes"></i> Categorias</h1>
          </div>
        </div>
      </div>
        
      {include file='msg.tpl'}

      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Categorias</h3>
            </div>

            
            <form class="panel-body form-inline" role="form" method="get" action="">
              <div class="form-group">
                <label class="sr-only" for="fq">Pesquisa</label>
                <input type="search" class="form-control" id="fq" name="q" placeholder="Pesquisa" value="{$q}">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Categoria</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  {foreach from=$categorias item='categoria'}
                <tr>
                  <td>{$categoria.idcategoria}</td>
                  <td>{$categoria.categoria}</td>
                  <td>
                    <a href="categorias-editar.php?idcategoria={$categoria.idcategoria}" title="Editar"><i class="fa fa-edit fa-lg"></i></a>
                    <a href="categorias-apagar.php?idcategoria={$categoria.idcategoria}" title="Remover"><i class="fa fa-times fa-lg"></i></a>
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    {include file='javascript.tpl'}

  </body>
</html>