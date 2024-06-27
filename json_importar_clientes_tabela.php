<?php
	include('conexao.php');
	include('validar.php');
	include('restrito.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <script src="jquery/jquery-3.7.0.js" type="text/javascript"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: 'json_listar_clientes.php',
                type: 'GET',
                dataType: 'json'
            }).done(function(data) {
                $.each(data, function(index, cliente) {
                    var row = '<tr>' +
                                '<td>' + cliente.id + '</td>' +
                                '<td>' + cliente.nome + '</td>' +
                                '<td>' + cliente.cpf + '</td>' +
                                '<td>' + cliente.status + '</td>' +
                            '</tr>';
                    console.log(row);
                    $('#body_clientes').append(row);
                });
            }).fail(function(xhr, status, error) {
                console.error('Ocorreu um erro na requisição AJAX: ' + status + ' ' + error);
            });
        });
    </script>
</head>
<body>
    <?php include('menu.php'); ?>
    <a href="listar_clientes.php"><button class="btn-actions">Voltar</button></a>
    <h1>Lista de Clientes</h1>
    <table class="tabela" id="tabela_clientes">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="body_clientes">
            
        </tbody>
    </table>
</body>
</html>