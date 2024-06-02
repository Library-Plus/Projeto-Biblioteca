<?php
	include('conexao.php');
?>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
<head>
    <title>Lib+</title>
</head>
<body>
    <header class="header-container">
	    <div class="logo">
		     <h1>  Lib+ </h1>
	    </div>
        <div class="menu">
            <a href="listar_clientes.php">Clientes</a>
            <a href="listar_vendedores.php">Vendedores</a>
            <a href="listar_tipos.php">Tipos</a>
            <a href="listar_livros.php">Livros</a>
            <a href="listar_aluguel.php">Aluguel</a>
            <a href="listar_usuarios.php">Usuários</a>
            <a href="feedback.php">Seu retorno</a>
        </div>
        <div class="user-box">
			<img class="img-box" src="imagens/user.png" alt="user" > <br>
			<p class="nome-box"> <?php echo $_SESSION['usuario']['nome'];?> </p><br>
			<a href="sair.php"><img class="button-box" src="imagens/sair.svg"></a>
		</div>
    </header>
</body>