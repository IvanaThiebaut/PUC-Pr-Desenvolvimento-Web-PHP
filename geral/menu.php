<?php 
	session_start();
	if(!isset($_SESSION ['login'])){                              // Não houve login ainda
        unset($_SESSION ['nao_autenticado']);
		unset($_SESSION ['mensagem_header'] ); 
		unset($_SESSION ['mensagem'] ); 
		header('location: /TerapiaCapilarTesteCss/index.php');    // Vai para a página inicial
		exit();
    }
	?>

	<div class="p-top"   > 
		<div class="p-row p-white p-padding" >
			<div class="p-half" style="margin:0 0 0 0">
				<a href="."><img src='imagens/LOGO_THALI.png' alt=' Terapia Capilar '></a>
			</div>
			<div class="p-half p-margin-top p-hide-medium p-hide-small">
				<div class="p-right"> Usuário: <?php echo $_SESSION['nome']; ?>&nbsp;<a href="logout.php" 
				class="p-btn p-red p-hover-red">&nbsp;Sair&nbsp;</a>
				</div >
			</div>
			
		</div>

		<div id="menuCliente" class="myMenu">
			<div class="p-container">
				<h3>Menu Clientes</h3>
			</div>
		<a class="p-bar-item p-button" href="clienteListar.php">Relação de Clientes</a>
		<a class="p-bar-item p-button" href="clienteIncluir.php">Cadastro de Clientes</a>
		</div>
		
	</div>


	<script type="text/javascript" src="js/scriptTerapia.js"></script>
