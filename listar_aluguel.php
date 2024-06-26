<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Lib+</title>
		<script src="jquery/jquery-3.7.0.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.excluir').on('click', function () {
					var retorno = confirm('Deseja excluir este item?');
					if(retorno) {
						var obj = $(this);
						var ID = obj.closest('tr').find('td').html();

						$.ajax({
							url: 'excluir_aluguel_db.php',
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
        		        url: 'listar_aluguel_db.php',
        		        method: 'GET',
        		        data: {
        		            txtBuscar: txtBuscar,
        		        }
        		    }).done(function (dados) {
                		$('#tabela_aluguel tbody').html(dados);
        		    });
        		});
			});
		</script>
	</head>
	<body>
		<?php include('menu.php'); ?>

		<form>
    		<label>Buscar nome do Cliente</label><br>
    		<input type="text" name="txtBuscar" id="txtBuscar">
    		<button type="button" class="btn-actions" id="buscar">Buscar</button>
		</form>
		
		<a href="cadastrar_aluguel.php"><button class="btn-actions">Cadastrar</button></a>
		<table class="tabela" id="tabela_aluguel">
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
						<a href="alterar_aluguel.php?id=<?php echo $item['id']; ?>">Alterar</a><br>
						<a class="excluir">Excluir</a>
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


