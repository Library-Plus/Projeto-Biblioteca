<?php
	include('conexao.php');
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<form action="cadastrar_vendedores_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="200"><br><br>
			
			<label for="endereco">Endereço:</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="100"><br><br>

			<label for="telefone">Telefone:</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="14"><br><br>

			<label for="cpf">CPF:</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="14"><br><br>
			
			<label for="admissao">Admissão:</label><br>
			<input type="date" name="admissao" id="admissao"><input type="time" name="admissao_hora" id="admissao_hora"><br><br>
			
			<label for="status">Status:</label><br>
			<select name="status" id="status">
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

