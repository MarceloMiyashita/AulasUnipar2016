<?php

class IndexController extends Blog_Controller_Action {

    public function indexAction() {
        $idcategoria = (int) $this->getParam('idcategoria',0);
        
        $select = $this->select();
        if($idcategoria > 0){
            $select->where('c.idcategoria  = ?',$idcategoria);
        }
            
        $select->order('p.idpost desc');
        $select->limit(10);
        
        $consulta = $select->query()->fetchAll();
        $this->view->posts=$consulta;
        
        
    }

    public function categoriasAction() {
      $dbAdapter  = Zend_Db_Table_Abstract::getDefaultAdapter();
      $select = $dbAdapter->select();
      $select->from('categoria');


      $categoria = $select->query()->fetchAll();

      $this->view->categorias = $categoria;
    }

    public function postAction() {
        $idpost = (int) $this->getParam('idpost',0);
        
        $select = $this->select();
        $select->where('p.idpost = ?', $idpost);
        
        $post = $select->query()->fetch();
        
        $this->view->post = $post;
    }
    
    private function select(){
        $dbAdapter  = Zend_Db_Table_Abstract::getDefaultAdapter();
        $select = $dbAdapter->select();
        $select->from(array(
            'p' => 'post'            
        ),array(
            'titulo','texto','idpost'
        ));
        $select->joinInner(array(
            'c' => 'categoria'
        ), 'p.idcategoria = c.idcategoria',array(
            'categoria'
        ) );
        return $select;
    }

}
