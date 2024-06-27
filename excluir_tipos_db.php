<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
			
	$id = $_GET['id'];

	$sql = "DELETE FROM tipo WHERE id = {$id}";
	if ($usuario['tipo'] == 1){
		$query = mysqli_query($conexao, $sql);
	}

	if (!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($conexao);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = "Tipo {$id} excluido com sucesso!";
	}

	echo json_encode($arr);

	mysqli_close($conexao);
?>


