<?php
	include('conexao.php');
	include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Lib+</title>
		<script src="jquery/jquery-3.7.0.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$(document).on('click', '.excluir', function () {
					var retorno = confirm('Deseja excluir este item?');
					if(retorno) {
						var obj = $(this);
						var ID = obj.closest('tr').find('td').html();

						$.ajax({
							url: 'excluir_livros_db.php',
							method: 'GET',
							data: {
								id: ID,
							}
						}) 
						.done(function (dados) {
							var item = JSON.parse(dados);
							alert(item.msg);
							if (item.tipo == 'ok') {
								obj.closest('tr').remove();
							}
						});
					}
				});
				$('#buscar').on('click', function () {
            		var txtBuscar = $('#txtBuscar').val();
            		$.ajax({
                		url: 'listar_livros_db.php',
                		method: 'GET',
                		data: {
                    	txtBuscar: txtBuscar,
                	}
            		}).done(function (dados) {
                		$('#tabela_livros tbody').html(dados);
            		});
        		});
			});
		</script>
	</head>
	<body>
		<?php include('menu.php'); ?>

		<label>Buscar Livro por nome</label><br>
		<form class="buscar">
    		<input type="text" name="txtBuscar" id="txtBuscar">
    		<button type="button" class="btn-actions" id="buscar">Buscar</button>
		</form>
		
		<?php
			if ($_SESSION['usuario']['tipo'] == 1){
		?>		<a href="cadastrar_livros.php"><button class="btn-actions">Cadastrar</button></a>
		<?php
			}
		?>
		<table class="tabela" id="tabela_livros">
			<thead>
				<tr>
					<th>Código</th>
					<th>Título</th>
					<th>Capa</th>
					<th>Gênero</th>
					<th>Sinopse</th>
					<th>Status</th>
					<?php
						if ($_SESSION['usuario']['tipo'] == 1){
							echo '<th>Ações</th>';
						}
					?>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = 'SELECT livro.id, livro.titulo, livro.capa, tipo.genero AS tipo, livro.sinopse, livro.status
				FROM livro
				JOIN tipo ON livro.id_tipo = tipo.id'; 
				$query = mysqli_query($conexao, $sql);
				if (!$query) {
					echo 'Erro no banco: ' . mysqli_error($conexao);
				}
				while ($item = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['titulo']; ?></td>
					<td><img class="capa" src="capas/<?php echo $item['capa']; ?>" alt="<?php echo $item['titulo']; ?>"></td>
					<td><?php echo $item['tipo']; ?></td>
					<td><?php echo $item['sinopse']; ?></td>
					<td><?php echo $item['status'] == 'A' ? 'Ativo' : 'Inativo'; ?></td>
					<?php
						if ($_SESSION['usuario']['tipo'] == 1){
					?>  	
							<td>
								<a href="alterar_tipos.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
								<a class="excluir">Excluir</a>
							</td>
					<?php	
						}
					?>
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


