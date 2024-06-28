<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
			
	$id = $_GET['id'];

	$sql = "DELETE FROM vendedor WHERE id = '{$id}'";
	$query = mysqli_query($conexao, $sql);
	
	if (!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($conexao);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = "Vendedor {$id} excluido com sucesso!";
	}

	echo json_encode($arr);

	mysqli_close($conexao);
?>


