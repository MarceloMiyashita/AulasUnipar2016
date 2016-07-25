<?php

class Application_Form_Post extends Zend_Form {

    public function init() {
        $this->setMethod('post');
        
        $titulo = new Zend_Form_Element_Text('titulo', array(
            'label' => 'Título do post',
            'required' => true
        ));
        
        $this->addElement($titulo);
        
        $categoria = new Zend_Form_Element_Select('idcategoria', array(
          'label' => 'Categoria',
          'required' => true
        ));
        $this->addElement($categoria);
        $categoria->setMultiOptions($this->pegarCategorias());
        
        $f = new Zend_Filter_Null();
        $categoria->addFilter($f);
 
        
        $texto = new Zend_Form_Element_Textarea('texto', array(
            'label' => 'Conteúdo do post',
            'required' => true
        ));
        $this->addElement($texto);
        
        $botao = new Zend_Form_Element_Submit('botao', array(
            'label' => 'Salvar'
        ));
        $this->addElement($botao);
    }
    private function pegarCategorias(){
        
        $tab = new Application_Model_DbTable_Categoria();
        
        $categorias = $tab->fetchAll()->toArray();
    
        $options = array();
        $options[0] = 'Selecione uma Categoria';
        foreach ($categorias as $item){
            $idcategoria = $item['idcategoria'];
            $nomecategoria = $item['categoria'];
            
            $options[$idcategoria] = $nomecategoria;
        }
        
        return $options;
    }
}
