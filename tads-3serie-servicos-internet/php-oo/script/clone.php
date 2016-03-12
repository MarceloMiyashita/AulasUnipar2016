<?php
class Celular {
	public $numero;

	public function __clone() {
		$this->numero = '(22) 1111111';
	}
}

$celular = new Celular();
$celular->numero = '(11) 1111111';

$celularClone = clone $celular;

print_r($celular);
print_r($celularClone);