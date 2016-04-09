<?php

namespace App\Model;

use App\Conexao;
use PDO;

class Categoria {

    public function getAll() {
        $sql = 'Select * From categoria';
        
        $consulta = Conexao::getInstance()->query($sql);
        
        $r = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $r[] = $linha;
        }
        
        return $r;
    }
    
    public function cadastrar(array $dados) {
        $this->cadastrarValidar($dados);
        
        $sql = "Insert Into categoria
            (idcategoria, categoria) Values
            (null, :categoria)";
        
        $con = Conexao::getInstance();
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':categoria', $dados['categoria']);
        $stmt->execute();
        
        return $con->lastInsertId();
    }
    
    public function editar(array $dados){
        $sql = "update categoria set categoria = :categoria
            where idcategoria = :idcategoria";
        $con = Conexao::getInstance();
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':categoria',$dados['categoria']);
        $stmt->bindValue(':idcategoria',$dados['idcategoria']);
        $stmt->execute();
        
    }


    private function cadastrarValidar(array $dados) {
        $msg = array();
        if ($dados['categoria'] == '') {
            $msg[] = 'Nome da categoria deve ser informado';
        }
        else {
            $sql = "Select count(idcategoria) From categoria
                Where categoria = :categoria";
            $con = Conexao::getInstance();
            $st = $con->prepare($sql);
            $st->bindValue(':categoria', $dados['categoria']);
            $st->execute();
            
            if ($st->fetchColumn(0) > 0) {
                $msg[] = 'Nome de categoria já existe';
            }
        }
        
        if ($msg) {
            throw new \Exception(join("\n", $msg));
        }
    }

}
