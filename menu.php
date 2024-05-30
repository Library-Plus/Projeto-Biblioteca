<?php
	include('conexao.php');
?>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<head>
    <title>Lib+ Soluções</title>
</head>
<body>
    <header>
        <div class="cabecalho">
             <img class="logo" src="imagens/logo.png" alt="logo">
	    </div>
	    <div class="cabecalho">
		     <h1>  Lib+ </h1>
	    </div>
	    <div class="quebra"></div>

        <div class="menu">
            <table>
                <thead>
                    <tr>
                        <th><a class="link-menu" href="listar_clientes.php">Clientes</a></th>
                        <th><a class="link-menu" href="listar_vendedores.php">Vendedores</a></th>
                        <th><a class="link-menu" href="listar_tipos.php">Tipos</a></th>
                        <th><a class="link-menu" href="listar_livros.php">Livros</a></th>
                        <th><a class="link-menu" href="listar_aluguel.php">Aluguel</a></th>
                        <th><a class="link-menu" href="listar_usuarios.php">Usuários</a></th>
                        <th><a class="link-menu" href="feedback.php">Seu retorno</a></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="user-box">
			<img class="img-box" src="imagens/user.png" alt="user" > <br>
			<p class="nome-box"> <?php echo $_SESSION['usuario']['nome'];?> </p><br>
			<a href="sair.php"><img class="button-box" src="imagens/sair.png"></a>
		</div>
    </header>
</body>  
<br><br>