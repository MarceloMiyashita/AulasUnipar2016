<?php

require 'conexao.php';

$sql = "Select * From produto Order By preco Desc";

$res = mysqli_query($con, $sql);
?>

<table border="1">
	<tr>
		<td>#</td>
		<td>Ref.</td>
		<td>Nome</td>
		<td>Preco</td>
		<td>A vista</td>
	</tr>
<?php
while($produto = mysqli_fetch_assoc($res)) {
	$preco = (float) $produto['preco'];
	$preco2 = $preco * 90 / 100;

	$precoUsuario = number_format($preco, 2, ',', '.');
	$preco2Usuario = number_format($preco2, 2, ',', '.');
?>
	<tr>
		<td><?php echo $produto['idproduto']; ?></td>
		<td><?php echo $produto['referencia']; ?></td>
		<td><?php echo $produto['descricao']; ?></td>
		<td><?php echo $precoUsuario; ?></td>
		<td><?php echo $preco2Usuario; ?></td>
	</tr>
<?php
}
?>
</table>