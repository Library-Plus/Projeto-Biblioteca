<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
			
	$id = $_POST['id'];

	$sql = "DELETE FROM usuario WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_usuarios.php?erro=3&msg=' . mysqli_error($conexao));
	} else {
		header('Location: listar_usuarios.php?ok=3&msg=' . $id);
	}

	mysqli_close($conexao);
?>


