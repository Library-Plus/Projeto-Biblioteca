<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
		<style>
			table {
				border-collapse: collapse;
			}
			th, td {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<?php include('menu.php'); ?>
		<a href="cadastrar_livros.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Título</th>
					<th>Gênero</th>
					<th>Sinopse</th>
					<th>Status</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT id, id_tipo, titulo, sinopse,  status FROM livro'; 
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['titulo']; ?></td>
					<td><?php echo $item['id_tipo']; ?></td>
					<td><?php echo $item['sinopse']; ?></td>
					<td><?php echo $item['status'] == 'A' ? 'Ativo' : 'Inativo'; ?></td>
					<td>
						<a href="alterar_livros.php?id=<?php echo $item['id']; ?>">Alterar</a>
						<a href="excluir_livros.php?id=<?php echo $item['id']; ?>">Excluir</a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		Existe(m) <?php echo mysqli_num_rows($query); ?> registro(s)
	</body>
</html>
<?php
	mysqli_close($conexao);
?>


