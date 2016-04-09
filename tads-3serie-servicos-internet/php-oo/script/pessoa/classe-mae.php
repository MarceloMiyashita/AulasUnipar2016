<?php
require "classe-pessoa.php"
class Mae extends Pessoa{
	private $marido;

	public function casar($conjugue){
		if($this->estadoCivil == 1){
			return false;
		}
		$this->estadoCivil = 1;
		$this->marido = $conjugue;
		return true;
	}

	public function divorciar(){
		if($this->estadoCivil != 1){
			return false;
		}
		$this->estadoCivil = 2;
		$this->marido = null;
		return true;
	}
	public function ficarViuvo(){
		if($this->estadoCivil != 1){
			return false;
		}	
		$this->estadoCivil = 3;
		$this->marido = null;
		return true;
	}

	public function morrer(){
		if($this->vivo == 0){
			return false;
		}
		
		if($this->estadoCivil == 1){
			$marido->ficarViuvo();
		}

		$this->vivo = 0;
		return true;

	}


}