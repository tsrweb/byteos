<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();

	if((!isset($_SESSION['nome']))){
		header('location: index.php');
	}

	$logado = $_SESSION['nome'];	
	
	if($logado != "Byte OS"){
		echo "<style>#adm{display: none;}</style>";
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">

<head>

<title>Novo Ticket</title>

<link href="css/estilos.css" rel="stylesheet" />
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="jquery/jquery-1.11.3.js"></script>

</head>

<body>
<div id="conteudoArea">

<div id="conteudo">
				
		<h1>Ticket</h1>
	
	<form method="post" action="cadastrarTicket.php">
	
		<label for="empresa">Empresa:</label>
		<input type="text" id="empresa" class="inputAll" name="empresa" value="<?php echo $logado;?>" readonly size="50"/>	<br /><br />
	
			<div class="campoLateral"/>
				<label for="equipamento">Selecione o Equipamento:</label>
				<select id="equipamento" name="equipamento" class="inputAll" required style="padding: 8px 7px 6px 7px;">
					<option value=""></option>
					<option value="CPU">CPU</option>
					<option value="Monitor">Monitor</option>
					<option value="Notebook">Notebook</option>
					<option value="Teclado">Teclado</option>
					<option value="Mouse">Mouse</option>
					<option value="Estabilizador">Estabilizador</option>
					<option value="NoBreak">NoBreak</option>
					<option value="Módulo Isolador">Módulo Isolador</option>
					<option value="Caixa De Som">Caixa de Som</option>
					<option value="Projetor">Projetor</option>
					<option value="Impressora a Laser">Impressora a Laser</option>
					<option value="Impressora Jato de Tinta">Impressora Jato de Tinta</option>
					<option value="Multifuncional a Laser">Multifuncional a Laser</option>
					<option value="Multifuncional Jato de Tinta">Multifuncional Jato de Tinta</option>
					<option value="DVR">DVR</option>
					<option value="Cameras">Cameras</option>
					<option value="Outros">Outros...</option>
				</select><br />
			</div>

		<label for="marcaModelo">Marca / Modelo:</label>
		<input type="text" id="marcaModelo" name="marcaModelo" class="inputAll"/><br /><br />

		<label for="codEquip">Código do Equipamento / Serial:</label>
		<input type="text" id="codEquip" class ="inputAll" name="codEquip" required size="50" placeholder="Se não houver, informe: S/ Serial" autocomplete="off"/>	<br /><br />
		
		<label for="defeitoRelatado" class="area">Defeito Relatado:</label>
		<textarea id="defeitoRelatado" name="defeitoRelatado" class="inputAll" rows="8" cols="50" placeholder="Detalhe o problema apresentado."></textarea>	<br /><br />

		<div class="campoLateral">
			<label for="solicitante">Solicitante:</label>
			<input type="text" id="solicitante" name="solicitante" class="inputAll" required autocomplete="off" placeholder="Digite seu Nome:"/><br />		
		</div>

		<label for="setor">Setor:</label>
		<input type="text" id="setor" class="inputAll" name="setor" autocomplete="off"/>	<br /><br />

		<label for="fnSolicitante">Telefone:</label>
		<input type="text" id="tel" class="inputAll" name="fnSolicitante" autocomplete="off"/>	<br /><br />
		
		<input type="submit" name="submit" value="Enviar" class="buttonAll" onclick="return confirm('Todos os dados estão corretos?');"/>
		<input type="reset" name="reset" value="Limpar" class="buttonAll"/>
		<a href="sistema.php"><button type="button" class="buttonAll" onclick="return confirm('Seu Ticket não sera enviado!');">Voltar</button></a>

	</form>

</div>
</div>
	<script type="text/javascript">

	tel();

	</script>
<?php include "menu.php" ?>
</body>
</html>