<?php

class AulaController extends Zend_Controller_Action {
    public function indexAction() {
        
    }
    
    /**
     * http://127.0.0.1/zend-framework/zf1-blog/public/aula/param?id=1&nome=unipar
     * http://127.0.0.1/zend-framework/zf1-blog/public/aula/param/id/1/nome/unipar
     */
    public function paramAction() {
        $params = $this->getAllParams();
        // print_r($params);
        
        $id = $this->getParam('id', 5);
        $nome = $this->getParam('nome');
        // echo "id=$id nome=$nome";
        
        $this->view->codigo = $id;
        $this->view->nome = $nome;
    }
    
    public function valnumerosAction() {
        $val = new Zend_Validate_Digits();
        
        $valor = 'chiquitto';
        
        if (!$val->isValid($valor)) {
            echo "Houve erros:";
            print_r($val->getMessages());
        }
        
        exit;
    }
}