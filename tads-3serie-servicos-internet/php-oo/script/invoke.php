<?php
class Conexao {
	private $conexao;

	public function __invoke() {
		// return $this->conexao;
		echo "Chamou o invoke";
	}
}

$conexao = new Conexao();

$conexao();