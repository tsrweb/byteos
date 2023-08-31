<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();
	session_destroy();	
?>

<!DOCTYPE html>
<html lang="pt-br" >
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="css/estilosLogin.css" rel="stylesheet" />
		<script type="text/javascript" src="js/javascript.js"></script>
		<!--[if lt IE 11]> <meta http-equiv="X-UA-Compatible" content="IE=8"/> <style type="text/css">#infoIE{visibility: visible;}</style><![endif]-->	
	</head>

<body>	

	<span id="infoIE">Prezado cliente!<br />
	Detectamos que seu navegador está desatualizado!<br />
	a Byte OS trabalha com as mais novas tecnologias existentes no mercado,<br />
	para melhor experiência com o sistema atualize seu navegador ou use<br />
	outro de sua preferência. </span>

	<div id="login">

		<div id="logo">
			<img src="img/logo.png" hrel="logomarca" />
		</div>

			<div id="campLogin">

				<form method="post" action="login.php" >

					<h1>Bem Vindo!</h1>
						
							<img src="img/login_user.png" hrel="iconLogin" />
							<input type="text" name="nome" class="input" required autocomplete="off" placeholder="Usuário"/><br /><br />
						
								<img src="img/login_password.png" hrel="iconLogin" />
								<input type="password" name="senha" class="input" required placeholder="Senha"/>
						
									<span id="erroLogin">Usuário ou Senha Inválidos! </span>
									<?php if((isset($_SESSION['erro']))){echo $_SESSION['erro'];}?>
						<br />
						<input type="submit" value="Entrar" class="button"/>
						<br /><br />
				</form>
			</div>
	</div>
	<div id="footer"><img src="img/logoTsr.png" hrel="logo TST WEB" /><p>Desenvolvido por:<br />Tiago Rodrigues<br /><a href="http://www.tsrweb.com.br" target="_blank">www.tsrweb.com.br</a></p></div>
</body>
</html>