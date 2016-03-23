<?php

class BaconPizza implements Pizza {
	public function massa ($tipo, $tamanho) {
		echo "Massa $tipo $tamanho<br>";
	}

	public function rechear () {
		echo "Recheio caprichado de Bacon<br>";
	}

	public function assar () {
		echo "Assar<br>";
	}

	public function cortar($pedacos) {
		echo "Cortar em $pedacos pedacos<br>";
	}
}