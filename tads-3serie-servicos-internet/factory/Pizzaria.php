<?php

class Pizzaria {
	public function factory ($sabor, $tipo, $tamanho) {
		switch ($sabor) {
			case 1:
				$pizza = new BaconPizza();
				break;
			case 2:
				$pizza = new CalabresaPizza();
				break;
		}

		$pizza->massa($tipo, $tamanho);
		$pizza->rechear();
		$pizza->assar();

		if ($tamanho == 'P') {
			$pedacos = 4;
		} elseif ($tamanho == 'M') {
			$pedacos = 6;
		} else {
			$pedacos = 8;
		}
		$pizza->cortar($pedacos );

		return $pizza;
	}
}