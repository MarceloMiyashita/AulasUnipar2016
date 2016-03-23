<?php

interface Pizza {
	public function massa($tipo, $tamanho);
	public function rechear();
	public function assar();
	public function cortar($pedacos);
}