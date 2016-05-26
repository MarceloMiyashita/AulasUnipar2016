<?php

class FiltroController
extends Zend_Controller_Action {
    public function digitsAction() {
        $filtro = new Zend_Filter_Digits();
        
        echo $filtro->filter(date('c'));
        exit;
    }
    
    public function htmlAction() {
        $filtro = new Zend_Filter_HtmlEntities();
        
        $var = "<strong>Brasil</strong>";
        
        echo $filtro->filter($var);
        exit;
    }
    
    public function stripAction() {
        $filtro = new Zend_Filter_StripTags();
        
        $var = "<strong>Brasil</strong>";
        
        echo $filtro->filter($var);
        exit;
    }
    
    public function compressAction() {
        $filtro = new Zend_Filter_Compress(array(
            'adapter' => 'Zip',
            'options' => array(
                'archive' => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\zend.zip'
            )
        ));
        
        $filtro->filter('C:\\cc3260mt.dll');
        
        exit;
    }
}