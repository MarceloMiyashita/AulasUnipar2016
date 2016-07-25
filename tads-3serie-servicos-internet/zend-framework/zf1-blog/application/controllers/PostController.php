<?php

class PostController extends Blog_Controller_Action {

    public function indexAction() {
       $tab = new Application_Model_DbTable_Post();
       $consulta = $tab->getAdapter()->select();
       $consulta->from(array(
           "p"=>"post"
       ), array(
           "idpost", "titulo"
       ));
       $consulta->joinInner(array(
           "c"=>"categoria"
       ), "c.idcategoria = p.idcategoria", array(
           "categoria"
       ));
       $consulta->where("p.idcategoria > ?", "0", Zend_Db::INT_TYPE);
      
       $consultaBd = $consulta->query()->fetchAll();
       $this->view->posts = $consultaBd;
       $this->view->podeApagar = true;
    }
    
    public function createAction() {
        $frm = new Application_Form_Post();
        if($this->getRequest()->isPost()){
            $params = $this->getAllParams();
            if($frm->isValid($params)){
                
            }
        }
        $this->view->frm = $frm;
    }
    

    public function deleteAction() {
        $idpost = (int) $this->getParam("idpost", "0");
        $model = new Application_Model_Post();
        $model->apagar($idpost);
        
        $flashMessenger = $this->_helper->FlashMessenger;
        $flashMessenger->addMessage('Registro apagado');
        
        $this->_helper->Redirector->gotoSimpleAndExit('index');
                       
    }

    public function updateAction() { 
        $idpost = (int)$this->getParam('idpost',0);
        $tab = new Application_Model_DbTable_Post();
        $row = $tab->fetchRow('idpost = '.$idpost);
            if($row === null){
                echo'post inexistente';
                exit;
            }

        $frm = new Application_Form_Post();
        if($this->getRequest()->isPost()){
            $params = $this->getAllParams();
            if($frm->isValid($params)){ 
               $params = $frm->getValues();
               $post = new Application_Model_Vo_Post();
               $post->setIdcategoria($params['idcategoria']);
               $post->setTexto($params['texto']);
               $post->setTitulo($params['titulo']);
               $post->setIdpost($idpost);
               
               $model = new Application_Model_Post();
               $model->atualizar($post);
               
               $f = $this->_helper->FlashMessenger;
               $f->addMessage('post foi salvo com sucesso');
               $this->_helper->Redirector->gotoSimpleAndExit('index');
               
               
            }    
            
            
            
        }else {
            $frm->populate(array(
                'texto'=>$row->texto,
                'titulo'=>$row->titulo,
                'idcategoria'=>$row->idcategoria
            ));
            
        }
        
        $this->view->frm = $frm;
        
    }

}
