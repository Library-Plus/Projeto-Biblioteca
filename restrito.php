<?php 
  include("conexao.php");
  if ($_SESSION['usuario']['tipo'] == 2){
    header('Location: error.php');
  }
?>