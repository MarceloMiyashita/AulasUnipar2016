<?php

abstract class Pessoa {
	protected $nome;
	protected $anoNascimento;
	protected $estadoCivil = 0;
	protected $vivo = 1;

	protected $pai;
	protected $mae;

	public function pegarEstadoCivil(){
		return $this->estadoCivil;
	}

	public function definirEstadoCivil($estadoCivil){
		if($estadoCivil >= 0 or $estadoCivil <= 3){
			$this->estadoCivil = $estadoCivil;
		}
	}

	public function pegarNome() {
		return strtoupper($this->nome);
	}
	public function definirNome($nome) {
		$this->nome = $nome;
	}

	public function pegarAnoNascimento() {
		return $this->anoNascimento;
	}
	public function definirAnoNascimento($anoNascimento) {
		$this->anoNascimento = $anoNascimento;
	}

	public function pegarIdade() {
		return date('Y') - $this->anoNascimento;
	}
}