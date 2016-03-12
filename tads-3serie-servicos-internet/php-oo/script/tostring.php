<?php
class Carro {
	public $montadora;
	public $modelo;
	public $ano;
	public function __toString() {
		return $this->montadora . ' ' . $this->modelo
		. ' ' . $this->ano;
	}
}

$carro = new Carro();
$carro->montadora = 'Fiat';
$carro->modelo = 'Palio';
$carro->ano = 2011;

echo $carro;
$s = (string) $carro;