<?php
class Celular {
	public function __call($nome, $valores) {
		echo $nome;
		print_r($valores);
	}
}

$celular = new Celular();

$celular->ligacao('44', '98667575');