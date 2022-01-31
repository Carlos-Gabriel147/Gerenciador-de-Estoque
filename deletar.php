<?php
	session_start();
	include('processos_php/processo_autenticar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deletar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_venda+deletar+adicionar.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_venda+deletar+adicionar.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
</head>
<body>
	<div class="fundo">
		<div class="areamenu">
			<a href="index.php" class="menu">Menu Principal</a>
		</div>
		<div class="fundo-branco">
			<h2 class="titulo">Excluir Produto</h2>
			<?php
				if(isset($_SESSION['deletar'])):
				switch ($_SESSION['deletar']):
				case 1:
			?>
			<div class="erro">
				<p>ERRO: O código informado não foi encontrado!</p>
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
				unset($_SESSION['deletar']);
			?>
			<form name="venda" action="processos_php/processo_deletar.php" method="POST">
				<label for="codigo">Código do Produto:</label><br>
				<input type="text" class="entrada" min="0" maxlength="25" required name="codigo"><br>
				<h3 class="certeza">Tem Certeza que Deseja Excluir?</h3><br>
				<div class="botoeslado">
					<?php
					if(isset($_SESSION['etq'])){
						if ($_SESSION['etq']==1){
							echo "<a class='voltar' href='estoque_geral.php'>"."Voltar"."</a>";
						}
						if ($_SESSION['etq']==2){
							echo "<a class='voltar' href='estoque_baixo.php'>"."Voltar"."</a>";
						}
						echo "<input type='submit' name='confirmar' value='Excluir' class='botao1'>";
						}else{
							echo "<input type='submit' name='confirmar' value='Excluir' class='botao2'>";
						}
					?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>





