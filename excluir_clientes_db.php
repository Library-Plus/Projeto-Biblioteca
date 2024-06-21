<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
			
	$id = $_POST['id'];

	$sql = "DELETE FROM cliente WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	if (!$query) {
		header('Location: listar_clientes.php?erro=3&msg=' . mysqli_error($conexao));
		// echo 'Não foi possível excluir o Cliente! Erro no banco: ' . mysqli_error($conexao);
	} else {
		header('Location: listar_clientes.php?ok=3&msg=' . $id);
		// echo 'Cliente excluído com sucesso! Código ' . $id;
	}

	mysqli_close($conexao);
?>


