<?php

require 'banco.php';

$sql = "Select * From alunos";

$alunos = mysqli_query($con, $sql);

while ($aluno = mysqli_fetch_assoc($alunos)) {
	// print_r($aluno);
	echo $aluno['ra'] . ': ' . $aluno['nome'] . "<br>";
}