<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title>Lib+</title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<a href="cadastrar_vendedores.php"><button class="btn-actions">Cadastrar</button></a>
		<table class="tabela">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>CPF</th>
					<th>Admissão</th>
					<th>Status</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT id, nome, telefone, cpf, admissao, status FROM vendedor';
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['nome']; ?></td>
					<td><?php echo $item['telefone']; ?></td>
					<td><?php echo $item['cpf']; ?></td>
					<td><?php echo $item['admissao']; ?></td>
					<td><?php echo $item['status'] == 'A' ? 'Ativo' : 'Inativo'; ?></td>
					<td>
						<a href="alterar_vendedores.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
						<a href="excluir_vendedores.php?id=<?php echo $item['id']; ?>">Excluir</a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<p> Existe(m) <?php echo mysqli_num_rows($query); ?> registro(s)</p>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


