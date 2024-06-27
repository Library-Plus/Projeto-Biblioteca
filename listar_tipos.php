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
							url: 'excluir_tipos_db.php',
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
                		url: 'listar_tipos_db.php',
                		method: 'GET',
                		data: {
                    	txtBuscar: txtBuscar,
                	}
            		}).done(function (dados) {
                		$('#tabela_tipos tbody').html(dados);
            		});
        		});
			});
		</script>
	</head>
	<body>
		<?php include('menu.php'); ?>
		
		<label>Buscar Gênero</label><br>
		<form class="buscar">
    		<input type="text" name="txtBuscar" id="txtBuscar">
    		<button type="button" class="btn-actions" id="buscar">Buscar</button>
		</form>

		<a href="cadastrar_tipos.php"><button class="btn-actions">Cadastrar</button></a>
		<table class="tabela" id="tabela_tipos">
			<thead>
				<tr>
					<th>Código</th>
					<th>Gênero</th>
					<?php
						if ($_SESSION['usuario']['tipo'] == 1){
							echo '<th>Ações</th>';
						}
					?>
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
					<?php
						if ($_SESSION['usuario']['tipo'] == 1){
							echo '<td>
								  	<a href="alterar_tipos.php?id=' . $item['id'] . '>Alterar</a><br>
								  	<a class="excluir">Excluir</a>
								  </td>';
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


