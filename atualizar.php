<?php
	session_start();
	include('processos_php/processo_autenticar.php');
	include('processos_php/processo_conectar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Produto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_inserir+atualizar.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_inserir+atualizar.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
</head>
<body>
	<div class="fundo">
		<div class="areamenu"><a href="index.php" class="menu">Menu Principal</a></div>
		<div class="formulario">
			<h2 class="titulo">Preencha os Novos Dados do Produto</h2>
			<p class="espaco"></p>
			<?php
				if(isset($_SESSION['atualizar'])):
				switch ($_SESSION['atualizar']):
				case 1:
			?>
			<div class="erro">
				<p>ERRO: O código informado não existe!</p>
			</div>
			<?php
				break;
				case 2:
			?>
			<div class="sucesso">
				<p>Ação realizada com sucesso!</p>
			</div>
			<?php
				break;
				case 3:
			?>
			<div class="erro">
				<p>ERRO: Por favor informe um Nome ou Categoria!</p>
			</div>
			<?php
				break;
				case 4:
			?>
			<div class="erro">
				<p>ERRO: O novo código selecionado já existe!</p>
			</div>
			<?php
				break;
				endswitch;
				endif;
				unset($_SESSION['atualizar']);
			?>
			<form action="processos_php/processo_atualizar.php" method="POST" class="topico">

				<label for="nome">Nome:</label><br>
				<input type="text" name="nome" value="" class="entrada" maxlength="40" placeholder="(Opcional)"><br>

				<label for="categoria">Categoria:</label><br>
				<input type="text" name="categoria" list="lista" value="" class="entrada" maxlength="40" placeholder="(Opcional)">
				<datalist id="lista">
					<?php	
						$categoria= mysqli_query($con, "SELECT Categoria FROM estoque GROUP BY Categoria");
						while($catg=mysqli_fetch_array($categoria)){
							echo "<option value=".$catg['Categoria']."><br>";
						}	
					?>
				</datalist><br>
				
<label for="quantidade">Estoque Baixo:</label><br>
				<input type="number" name="baixo" min="0" value="" class="entrada" max="65535" placeholder="(Opcional)"><br>

				<label for="codigo">Código Atual do Produto:</label><br>
				<input type="text" name="codigo" min="0" value="" maxlength="25" required class="entrada"><br>

				<label for="Ncodigo">Novo Código do Produto:</label><br>
				<input type="text" name="Ncodigo" min="0" value="" maxlength="25" class="entrada" placeholder="(Opcional)"><br>
				
				<p class="espaco"></p>
				<input type="submit" name="cadastrar" value="Atualizar" required class="botao">
			</form>
		</div>
	</div>
</body>
</html>


