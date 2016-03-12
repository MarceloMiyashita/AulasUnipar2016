<?php
class Celular {
	public function __set($atributo, $valor) {
		echo "$atributo = $valor";
	}
	public function __get($atributo) {
		echo "Retornar $atributo";
	}
}

$celular = new Celular();

$celular->numero = '4499850123';

echo $celular->numero;