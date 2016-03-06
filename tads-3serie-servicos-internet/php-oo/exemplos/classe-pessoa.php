<?php  
class Pessoa{
 public $nome;
 public $anoNascimento;
 public $pai;
 public $mae;

 public function pegarNome(){
 	return strtoupper($this->nome);
 }

 public function pegarIdade(){
 	return date('Y') - $this->anoNascimento; 
 }

}

