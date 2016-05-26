<?php

class CategoriaController extends Blog_Controller_Action {

    public function indexAction() {
        
    }

    public function createAction() {
        $frm = new Application_Form_Categoria();
        
        if ($this->getRequest()->isPost()) {
            $params = $this->getAllParams();
            
            if ($frm->isValid($params)) {
                $params = $frm->getValues();
                print_r($params);
                exit;
            }
        }
        
        $this->view->frm = $frm;
    }

    public function deleteAction() {
        
    }

    public function updateAction() {
        
    }

}
