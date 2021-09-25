<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();	
	
	$logado = $_SESSION['nome'];
	
	if($logado != "Byte OS"){
		header('location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="pt-br" >
	<head>
		<meta charset="utf-8" />
		<title>Cadastrar Empresa</title>
		<link href="css/estilos.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<script type="text/javascript" src="jquery/jquery-1.11.3.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <![endif]-->
	</head>

		<div id="conteudoArea">

				<div id="conteudo">
						
					<h1>Cadastrar Empresa</h1>

						<form method="post" action="cadastrarEmpresa.php" >
							
							<label for="empresa">Nome da Empresa:</label>
							<input type="text" name="empresa" class="inputAll" size="50" required autocomplete="off"/><br /><br />
							<label for="cnpj">CNPJ:</label>
							<input type="text" name="cnpj" class="inputAll" id="cnpj" required autocomplete="off"/><br /><br />

									<div class="campoLateral">
										<label for="logradouro">Logradouro:</label>	
										<input type="text" name="logradouro" class="inputAll" size="50" required autocomplete="off"/><br />
									</div>

							<label for="logNumero">Número:</label>							
							<input type="text" name="logNumero" id="logNumero" class="inputAll" size="5" required autocomplete="off"/><br /><br />
									
									<div class="campoLateral">
										<label for="bairro">Bairro:</label>
										<input type="text" name="bairro" class="inputAll" required autocomplete="off"/>	<br />
									</div>

									<div class="campoLateral">
										<label for="cidade">Cidade:</label>					
										<input type="text" name="cidade" class="inputAll" required autocomplete="off"/><br />
									</div>

									<div class="campoLateral">
										<label for="uf">UF:</label>
										<input type="text" name="uf" id="uf" class="inputAll" size="1" maxlength="2" style="text-transform:uppercase" required autocomplete="off"/><br />			
									</div>

							<label for="cep">CEP:</label>						
							<input type="text" name="cep" id="cep" class="inputAll" size="5" required autocomplete="off"/><br /><br />

							<label for="telefone">Telefone:</label>
							<input type="text" name="telefone" id="tel" class="inputAll" size="10" required autocomplete="off"/><br /><br />
							<label for="email">E-Mail:</label>
							<input type="text" name="email" class="inputAll" size="50" required autocomplete="off"/><br /><br />
							<label for="contato">Contato:</label>
							<input type="text" name="contato" class="inputAll" required autocomplete="off"/><br /><br />

									<div class="campoLateral">
							<label for="usuario">Usuário:</label>
							<input type="text" name="usuario" class="inputAll" required autocomplete="off"/><br />
									</div>

							<label for="senha">Senha:</label>
							<input type="password" name="senha" class="inputAll" required/> <br /><br />

							<input type="submit" value="Cadastrar" onclick="return confirm('Todos os dados estão corretos?');" class="buttonAll"/>
							<input type="reset" value="limpar" class="buttonAll"/>
							<a href="sistema.php"><button type="button" class="buttonAll" onclick="return confirm('O cadastro não será realizado!');">Voltar</button></a>

						</form>						
				</div>
		</div>
		
	<script type="text/javascript">

	mask();
	tel();

	</script>
	<?php include "menu.php" ?>
</body>
</html>