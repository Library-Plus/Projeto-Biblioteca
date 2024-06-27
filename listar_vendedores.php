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
				$(document).on('click', '.excluir', function () {
					var retorno = confirm('Deseja excluir este item?');
					if(retorno) {
						var obj = $(this);
						var ID = obj.closest('tr').find('td').html();

						$.ajax({
							url: 'excluir_vendedores_db.php',
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
                		url: 'listar_vendedores_db.php',
                		method: 'GET',
                		data: {
                    	txtBuscar: txtBuscar,
                	}
            		}).done(function (dados) {
                		$('#tabela_vendedores tbody').html(dados);
            		});
        		});
			});
		</script>
	</head>
	<body>
		<?php include('menu.php'); ?>

		<label>Buscar Vendedor por nome</label><br>
		<form class="buscar">
    		<input type="text" name="txtBuscar" id="txtBuscar">
    		<button type="button" class="btn-actions" id="buscar">Buscar</button>
		</form>
		
		<a href="cadastrar_vendedores.php"><button class="btn-actions">Cadastrar</button></a>
		<table class="tabela" id="tabela_vendedores">
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


