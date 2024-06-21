<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$cpf = $_POST['cpf'];
	$status = $_POST['status'];

	$sql = "INSERT INTO cliente VALUES (null, '{$nome}', '{$email}', '{$telefone}', '{$cpf}', '{$status}')";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_clientes.php?erro=1&msg=' . mysqli_error($conexao));
		// echo 'Não foi possível cadastrar o Cliente! Erro no banco: ' . mysqli_error($conexao);
	} else {
		header('Location: listar_clientes.php?ok=1&msg=' . mysqli_insert_id($conexao));
		// echo 'Cliente cadastrado com sucesso! Código ' . mysqli_insert_id($conexao);
	}

	mysqli_close($conexao);
?>


