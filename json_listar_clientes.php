<?php
	include('validar.php');
	include('conexao.php');

	$sql = 'SELECT id, nome, email, telefone, cpf, status FROM cliente';
	$query = mysqli_query($conexao, $sql);
	$array = [];
	$id_anterior = 0;
	$i = -1;
	while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		if ($id_anterior != $item['id']) {
			$i++;
			$array[$i]["id"] = $item["id"];
			$array[$i]["nome"] = $item["nome"];
			$array[$i]["email"] = $item["email"];
			$array[$i]["telefone"] = $item["telefone"];
			$array[$i]["cpf"] = $item["cpf"];
			$array[$i]["status"] = $item["status"];
		}
		
		$id_anterior = $item['id'];
	}
	
	echo json_encode($array);

	mysqli_close($conexao);
?>