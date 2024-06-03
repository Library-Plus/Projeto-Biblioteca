<?php
	include('validar.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title></title>
	</head>
	<body>
		<?php
			include('menu.php');
			
			$json = $_POST['json'];
			
			$array = json_decode($json, true);
			
			foreach($array as $cliente) {
				$id_cliente = $cliente['id'];
				$sql = "SELECT id FROM cliente WHERE id = {$id_cliente}";
				$query = mysqli_query($conexao, $sql);
				if(mysqli_num_rows($query) == 0){
					$sql = "INSERT INTO cliente VALUES ('{$cliente['id']}', '{$cliente['nome']}', '{$cliente['email']}', '{$cliente['telefone']}', '{$cliente['cpf']}', '{$cliente['status']}')";
				} else {
					$sql = "UPDATE cliente SET nome = '{$cliente['nome']}', email = '{$cliente['email']}', telefone = '{$cliente['telefone']}', cpf = '{$cliente['cpf']}', status = '{$cliente['status']}' WHERE id = {$cliente['id']}";
				}
				$query = mysqli_query($conexao, $sql);
			}
		?>
		Cliente cadastrado com sucesso!
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


