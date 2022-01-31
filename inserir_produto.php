<?php
	session_start();
	include('processos_php/processo_autenticar.php');
	include('processos_php/processo_conectar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Produtos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_inserir+atualizar.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_inserir+atualizar.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
</head>
<body>
	<div class="fundo">
		<a href="estoque_geral.php"><div class="seta-direita"></div></a>
		<div class="areamenu">
			<a href="index.php" class="menu">Menu Principal</a>
		</div>
		<div class="formulario">
			<h2 class="titulo">Preencha os Dados do Produto</h2>
			<p class="espaco"></p>
			<?php
				if(isset($_SESSION['inserir'])):
				switch ($_SESSION['inserir']):
				case 1:
			?>
			<div class="erro">
				<p>ERRO: O código informado já existe!</p>
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
				endswitch;
				endif;
				unset($_SESSION['inserir']);
			?>
			<form action="processos_php/processo_inserir.php" method="POST" class="topico">

				<label for="nome">Nome:</label><br>
				<input type="text" name="nome" value="" maxlength="40" required class="entrada"><br>

				<label for="categoria">Categoria:</label><br>
				<input type="text" name="categoria" list="lista" value="" maxlength="40" class="entrada">
				<datalist id="lista">
					<?php	
						$categoria= mysqli_query($con, "SELECT Categoria FROM estoque GROUP BY Categoria");
						while($catg=mysqli_fetch_array($categoria)){
							echo "<option value=".$catg['Categoria']."><br>";
						}	
					?>
				</datalist><br>

				<label for="codigo">Código do Produto:</label><br>
				<input type="text" name="codigo" value="" min="0" maxlength="25" required class="entrada"><br>

				<label for="quantidade">Quantidade:</label><br>
				<input type="number" name="quantidade" value="" min="0" max="4294967295" class="entrada"><br>

				<label for="quantidade">Estoque Baixo:</label><br>
				<input type="number" name="baixo" min="0" value="" class="entrada" max="65535"><br>
			
				<p class="espaco"></p>
				<input type="submit" name="cadastrar" value="Cadastrar" required class="botao">
			</form>
		</div>
	</div>
</body>
</html>











