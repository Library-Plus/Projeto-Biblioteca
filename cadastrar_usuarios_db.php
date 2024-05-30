<?php
	include('conexao.php');
	include('validar.php');

	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	$tipo = $_POST['tipo'];

	$sql = "INSERT INTO usuario VALUES (null, '{$nome}', '{$usuario}', '{$senha}', '{$sexo}', '{$tipo}')";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_usuarios.php?erro=1&msg=' . mysqli_error($conexao));
	} else {
		header('Location: listar_usuarios.php?ok=1&msg=' . mysqli_insert_id($conexao));
	}

	mysqli_close($conexao);
?>


