<?php
	include('conexao.php');

	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$sql = "INSERT INTO usuario VALUES (null, '{$nome}', '{$usuario}', '{$senha}')";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_usuarios.php?erro=1&msg=' . mysqli_error($conexao));
	} else {
		header('Location: listar_usuarios.php?ok=1&msg=' . mysqli_insert_id($conexao));
	}

	mysqli_close($conexao);
?>


