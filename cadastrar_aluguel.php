<?php
	include('conexao.php');
	include('validar.php');
	$livro = @$_POST['livro'] ? $_POST['livro'] : 1;
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>


		<form action="cadastrar_aluguel_db.php" method="post">
			<label for="id_cliente">Cliente:</label><br>
			<select name="id_cliente" id="id_cliente">
				<?php
					$sql = 'SELECT id, nome FROM cliente';
					$query = mysqli_query($conexao, $sql);
					while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
				<?php
					}
				?>
			</select><br><br>

			<form action="cadastrar_aluguel_db.php" method="post">
			<label for="id_vendedor">Vendedor:</label><br>
			<select name="id_vendedor" id="id_vendedor">
				<?php
					$sql = 'SELECT id, nome FROM vendedor';
					$query = mysqli_query($conexao, $sql);
					while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
				<?php
					}
				?>
			</select><br><br>
		
			<label for="data_venda">Data do Aluguel:</label><br>
			<input type="date" name="data_venda" id="data_venda"><input type="time" name="data_venda_hora" id="data_venda_hora"><br><br>
			
			<table>
				<thead>
					<tr>
						<th>Livro</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i = 0; $i < $livro; $i++) { ?>
						<tr>
							<td>
								<select name="id_livro[]">
								<?php
									$sql = 'SELECT id, titulo FROM livro';
									$query = mysqli_query($conexao, $sql);
									while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								?>
								<option value="<?php echo $item['id']; ?>"><?php echo $item['titulo']; ?></option>
								<?php
									}
								?>
								</select>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>

