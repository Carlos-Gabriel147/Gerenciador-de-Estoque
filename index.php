<?php
	session_start();
	include('processos_php/processo_autenticar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_index.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_index.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
</head>
<body>
	<div class="fundo">
		<div class="botoes">
			<a href="processos_php/processo_finalizar.php" class="fechar">Fechar Sistema</a>
			<a href="atualizar.php" class="atualizar">Atualizar Produto</a>
		</div>
		<div class="opcoes">
			<h1 class="titulo">Escolha uma categoria</h1>
			<div class="alinhamento">
				<figure>
					<a href="inserir_produto.php"><img src="imagens/soma.png" class="imagem"></a>
					<figcaption>Inserir Produto</figcaption>
				</figure>
				<figure>
					<a href="estoque_geral.php"><img src="imagens/estoque.png" class="imagem"></a>
					<figcaption>Estoque Geral</figcaption>
				</figure>
				<figure>
					<a href="estoque_baixo.php"><img src="imagens/seta.png" class="imagem"></a>
					<figcaption>Estoque Baixo</figcaption>
				</figure>
			</div>
		</div>
	</div>
</body>
</html>


