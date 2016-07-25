<?php

require 'banco.php';

$ra = "06009999";
$nome = "Aluno 9999";

$sql = "Insert Into alunos (id, ra, nome)
Values (null, '$ra', '$nome')";

$r = mysqli_query($con, $sql);

if (!$r) {
	echo mysqli_error($con);
	exit;
}

$id = mysqli_insert_id($con);
echo $id;