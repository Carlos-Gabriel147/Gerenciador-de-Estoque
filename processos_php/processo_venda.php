<?php
	session_start();
	include('processo_conectar.php');
	$codigo = trim($_POST['codigo']);
	$quantidade = $_POST['quantidade'];

	$selecao = mysqli_query($con, "SELECT * FROM estoque WHERE Codigo LIKE '".$codigo."'");
	$numRegistros = mysqli_num_rows($selecao);
  
	if ($numRegistros != 0) {
		while ($produto = mysqli_fetch_object($selecao)){
			$Quantidade_antes = $produto->Quantidade;
			$Id = $produto->Id;
		}
	if(($Quantidade_antes - $quantidade)<0){
		$_SESSION['venda'] = 3;
		header('Location: ../venda.php');
		exit();        
	}else{
		$restante = mysqli_query($con, "UPDATE estoque SET Quantidade = ($Quantidade_antes - $quantidade) WHERE Id = $Id");
		$_SESSION['venda'] = 2;
		header('Location: ../venda.php');
		exit();
	}
	}else{
		$_SESSION['venda'] = 1;
		header('Location: ../venda.php');
		exit();
	}  
?>



