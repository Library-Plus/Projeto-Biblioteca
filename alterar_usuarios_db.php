<?php
	include('validar.php');
	include('conexao.php');
	include('restrito.php');
	
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'] ? " senha = '" . md5($_POST['senha']) . "'" : '';
	$tipo = $_POST['tipo'];

	$sql = "UPDATE usuario SET nome = '{$nome}', usuario = '{$usuario}', {$senha}, tipo = '{$tipo}'WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_usuarios.php?erro=2&msg=' . mysqli_error($conexao));
	} else {
		header('Location: listar_usuarios.php?ok=2&msg=' . $id);
	}

	mysqli_close($conexao);
?>


