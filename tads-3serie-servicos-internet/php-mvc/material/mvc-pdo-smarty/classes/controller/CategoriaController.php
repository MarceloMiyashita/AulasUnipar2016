<?php

namespace App\Controller;

class CategoriaController
{
    
    public function cadastrarAction()
    {
        $valores = array(
            'categoria' => ''
        );

        $msgAviso = array();

        if ($_POST) {
            $nomeCategoria = $_POST['categoria'];
            $dados = array(
                'categoria' => $nomeCategoria,
            );
            
            $model = new \App\Model\Categoria();
            
            try {
                $id = $model->cadastrar($dados);
            
                header('location:categorias.php');
                exit;
            } catch (\Exception $ex) {
                $msgAviso[] = $ex->getMessage();
            }
            
            $valores['categoria'] = $nomeCategoria;
        }
        
        $view = \App\View::getInstance();
        
        $view->assign('valores', $valores);
        $view->assign('msgAviso', $msgAviso);
        
        $view->display('categorias-cadastrar.tpl');
    }
    
    public function editarAction() {
      $codigo = $_GET['idcategoria'];
      $sql = "select categoria from categoria where idcategoria =
          :idcategoria";
      $con = \App\Conexao::getInstance();
      $stmt = $con->prepare($sql);
      $stmt->bindValue(":idcategoria", $codigo);
      $stmt->execute();
      $categoria = $stmt->fetch(\PDO::FETCH_ASSOC);
      if(!$categoria){
          echo "Categoria inexistente";
          exit;
      }      
      
      $valores = array(
          "idcategoria"=>$codigo,
          "categoria"=>$categoria['categoria']
      );
              
      $view = \App\View::getInstance();
      $view->assign('valores', $valores);
      $view->display('categorias-editar.tpl');
    }

    public function listarAction()
    {
        $categoriaModel = new \App\Model\Categoria();

        $categorias = $categoriaModel->getAll();
        
        $q = '';

        $view = \App\View::getInstance();
        $view->assign('categorias', $categorias);
        $view->assign('q', $q);
        $view->display('categorias.tpl');
    }

}
