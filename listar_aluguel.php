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
		<a href="cadastrar_aluguel.php">Cadastrar</a>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Data</th>
					<th>ID Cliente</th>
					<th>Nome do Cliente</th>
					<th>ID Vendedor</th>
					<th>Nome Vendedor</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT l.id,  
							   l.id_cliente, 
							   l.id_vendedor,
							   l.data_venda, 
							   c.nome AS nome_cliente,
							   v.nome AS nome_vendedor
						FROM aluguel AS l
						INNER JOIN cliente AS c ON (l.id_cliente = c.id) INNER JOIN vendedor AS v ON (l.id_vendedor = v.id)';
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['data_venda']; ?></td>
					<td><?php echo $item['id_cliente']; ?></td>
					<td><?php echo $item['nome_cliente']; ?></td>
					<td><?php echo $item['id_vendedor']; ?></td>
					<td><?php echo $item['nome_vendedor']; ?></td>
					<td>
						<a href="alterar_aluguel.php?id=<?php echo $item['id']; ?>">Alterar</a>
						<a href="excluir_aluguel.php?id=<?php echo $item['id']; ?>">Excluir</a>
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


