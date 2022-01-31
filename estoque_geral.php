<?php
	session_start();
	include('processos_php/processo_autenticar.php');
	include('processos_php/processo_conectar.php');
	$_SESSION['etq']=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Estoque Geral</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_geral+baixo.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_geral+baixo.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
	<script type="text/javascript" src="javascript/sorttable.js"></script>
</head>
<body>
	<div class="fundo">
		<a href="estoque_baixo.php"><div class="seta-direita"></div></a>
		<a href="inserir_produto.php"><div class="seta-esquerda1"></div></a>
		<div class="areamenu">
		<a href="index.php" class="menu">Menu Principal</a>
		</div>
		<div class="fundo-branco">
			<div class="titulo">
				<h2 class="titulo">Estoque Geral</h2> 
			</div>
			<div class="pesquisas">
				<div class="campo">
					<label for="nome" class="pesquisa">Nome:</label>
					<form name="frmBuscaNome" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscarNome" >
						<input type="text" name="palavra" maxlength="40" class="caixa">
						<input type="submit" value="Buscar" class="buscar">
					</form>
				</div>
				<div class="campo">
					<label for="codigo" class="pesquisa">Código:</label>
					<form name="frmBuscaCodigo" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscarCodigo" >
						<input type="text" name="palavra" maxlength="25" class="caixa">
						<input type="submit" value="Buscar" class="buscar">
					</form>      
				</div>
				<div class="campo">
					<label for="categoria" class="pesquisa">Categoria:</label>
					<form name="frmBuscaCategoria" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscarCategoria" >
						<input type="text" name="palavra" maxlength="40" class="caixa">
						<input type="submit" value="Buscar" class="buscar">
					</form>
				</div>
			</div>
			<p class="espaco"></p>
			<div class="opcoes">
				<a href="estoque_geral.php"><img src="imagens/icone_atualizar.png" class="opcao"></a>
				<a href="adicionar_estoque.php"><img src="imagens/icone_adicionar.png" class="opcao"></a>
				<a href="venda.php"><img src="imagens/icone_retirar.png" class="opcao"></a>
				<a href="deletar.php"><img src="imagens/icone_deletar.png" class="opcao1"></a>
			</div>
			<div class="dados">
				<?php 
					$tabela = mysqli_query($con, "SELECT * FROM estoque ORDER BY Categoria, Nome");
					function buscar($conexao,$busca){
   						if($_POST['palavra'] != ""){
							$palavra = trim($_POST['palavra']);
							if(($busca == "Nome") || ($busca == "Categoria")){
								$mensagem = strtolower($busca);
								$palavra = "'%".$palavra."%'";
							}else{
								$palavra = "'".$palavra."'";
								$mensagem = "código";
							}
							$sql = mysqli_query($conexao, "SELECT * FROM estoque WHERE ".$busca." LIKE ".$palavra);
							$numRegistros = mysqli_num_rows($sql);
							if ($numRegistros != 0){
								echo "<div class='resultado'>";
								while ($produto = mysqli_fetch_object($sql)) {
									echo "<div class='fundo-busca'>"."<div class='bloco'>Nome: <br>".$produto->Nome."</div>"."<div class='bloco'>Categoria: <br>".$produto->Categoria."</div>"."<div class='bloco'>Código: <br>".$produto->Codigo."</div>"."<div class='bloco'>Quantidade: <br>".$produto->Quantidade."</div>"."<div class='bloco'>Estoque Baixo: <br>".$produto->Baixo."</div>"."</div>";
								}
								echo "</div>";
							}else{
								echo "<div class='nao-encontrado'>Nenhum produto foi encontrado com ".$mensagem.": ".(trim($_POST['palavra']))."</div>";
							}
						}
					}
					@$a = $_GET['a'];
					if($a == "buscarNome"){
						buscar($con,"Nome");
					}

					if($a == "buscarCodigo"){
						buscar($con,"Codigo");
					}

					if($a == "buscarCategoria"){
						buscar($con,"Categoria");
					}
				?>
				<table cellpadding="0" cellspacing="0" border="1" class="sortable" bordercolor=#818181>
					<tr>
						<th class="tituloTabela">Código do Produto</th>
						<th class="tituloTabela">Nome do Produto</th>
						<th class="tituloTabela">Categoria</th>
						<th class="tituloTabela">Quantidade</th>
					</tr>
					<?php 
						while($tab = mysqli_fetch_object($tabela)){
							echo "<tr rowspan='2'><td>".$tab->Codigo."</td><td>".$tab->Nome."</td><td>".$tab->Categoria."</td><td>".$tab->Quantidade."</td></tr>";
						}
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>











