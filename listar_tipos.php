<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Lib+</title>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<a href="cadastrar_tipos.php"><button class="btn-actions">Cadastrar</button></a>
		<table class="tabela">
			<thead>
				<tr>
					<th>Código</th>
					<th>Gênero</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT id, genero FROM tipo';
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['genero']; ?></td>
					<td>
						<a href="alterar_tipos.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
						<a href="excluir_tipos.php?id=<?php echo $item['id']; ?>">Excluir</a>
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


