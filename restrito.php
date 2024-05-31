<?php 
  include("conexao.php");
	$sql_tipo = "SELECT * FROM usuario WHERE id=".$_SESSION['usuario']['id'];
	$query_tipo = mysqli_query($conexao, $sql_tipo);
	$item_tipo = mysqli_fetch_array($query_tipo, MYSQLI_ASSOC);
  if ($item_tipo['tipo'] == 2){
    header('Location: error.php');
  }
?>