<?php
	include('conexao.php');
	include('validar.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM aluguel WHERE id = {$id}";
	$query = mysqli_query($conexao, $sql);
	$item = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$livros = @$_POST['livro'] ? $_POST['livro'] : 1;

	$sql = "SELECT * FROM aluguel_livro WHERE id_venda = {$id}";
	$queryItemLocacao = mysqli_query($conexao, $sql);
	
	$data_venda = explode(' ', $item['data_venda']);
?>
<!DOCTYPE html>
<html lang="pt=br">
	<head>
		<title></title>
	</head>
	<body>
		<?php include('menu.php'); ?>		
		<form class="cadastro" action="alterar_aluguel.php?id=<?php echo $id; ?>" method="post">
			<label for="livros">Quantas livros?</label>
			<input type="number" name="livros" id="livros" value="<?php echo $livros; ?>" max="5" min="0">
			<button type="submit">Gerar</button>
		</form>

		<form action="alterar_aluguel_db.php" method="post">
			<label>Código</label><br>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<?php echo $id; ?><br><br>
			
			<label for="id_cliente">Cliente</label><br>
			<select name="id_cliente" id="id_cliente">
				<?php
					$sql = 'SELECT id, nome FROM cliente';
					$query = mysqli_query($conexao, $sql);
					while ($subitem = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
				<option value="<?php echo $subitem['id']; ?>"<?php if ($item['id_cliente'] == $subitem['id']) { ?> selected="selected"<?php } ?>><?php echo $subitem['nome']; ?></option>
				<?php
					}
				?>
			</select><br><br>
		
			<label for="data_venda">Data Venda</label><br>
			<input type="date" name="data_venda" id="data_venda" value="<?php echo $data_venda[0]; ?>"><br><br>

			<table>
				<thead>
					<tr>
						<th>Livros</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($itemLocacao = mysqli_fetch_array($queryItemLocacao, MYSQLI_ASSOC)) { ?>
						<tr>
							<td>
								<select name="id_livro[]">
								<?php
									$sql = 'SELECT id, titulo FROM livro';
									$query = mysqli_query($conexao, $sql);
									while ($subitem = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								?>
								<option value="<?php echo $subitem['id']; ?>"<?php if ($itemLocacao['id_livro'] == $subitem['id']) { ?> selected="selected"<?php } ?>><?php echo $subitem['titulo']; ?></option>
								<?php
									}
								?>
								</select>
							</td>
						</tr>
					<?php } ?>
					<?php for($i = 0; $i < $livros; $i++) { ?>
						<tr>
							<td>
								<select name="id_livro[]">
								<?php
									$sql = 'SELECT id, titulo FROM livro';
									$query = mysqli_query($conexao, $sql);
									while ($subitem = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								?>
								<option value="<?php echo $subitem['id']; ?>"><?php echo $subitem['titulo']; ?></option>
								<?php
									}
								?>
								</select>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
			<button type="submit">Alterar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>

