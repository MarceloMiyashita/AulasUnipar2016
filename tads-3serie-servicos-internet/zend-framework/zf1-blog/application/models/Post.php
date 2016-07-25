<?php

class Application_Model_Post {

    public function apagar($idpost) {
        $tab = new Application_Model_DbTable_Post();
        $tab->delete("idpost = $idpost");
        return true;
    }

    public function atualizar(Application_Model_Vo_Post $post) {
        $tab = new Application_Model_DbTable_Post();
        $tab->update(array
            ('idcategoria'=>$post->getIdcategoria(),
            'titulo'=>$post->getTitulo(),
            'texto'=>$post->getTexto(),
            ),'idpost = '. $post->getIdpost());
        
    return true;
        
    }

    public function salvar(Application_Model_Vo_Post $post) {
        
    }

}
