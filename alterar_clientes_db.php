<?php
	include('conexao.php');
	include('validar.php');
	
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$cpf = $_POST['cpf'];
	$status = $_POST['status'];

	$sql = "UPDATE cliente SET nome = '{$nome}', email = '{$email}', telefone = '{$telefone}', cpf = '{$cpf}', status = '{$status}' WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_clientes.php?erro=2&msg=' . mysqli_error($conexao));
		//echo 'Não foi possível alterar o Cliente! Erro no banco: ' . mysqli_error($conexao);
	} else {
		header('Location: listar_clientes.php?ok=2&msg=' . $id);
		//echo 'Cliente alterado com sucesso! Código ' . $id;
		//echo '<br> Foram alteradas ' . mysqli_affected_rows($conexao) . ' linha(s)';
	}

	mysqli_close($conexao);
?>


