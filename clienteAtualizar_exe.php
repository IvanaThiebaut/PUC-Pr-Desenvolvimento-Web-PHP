<!DOCTYPE html>
<html>
	<head>
	  <title>Terapia Capilar</title>
	  <link rel="shortcut icon" type="favicon" href="imagens/favicon.ico"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/styles.css">
	</head>
	<body onload="p_show_nav('menuCliente')">

	<!-- Inclui MENU -->
	<?php require 'geral/menu.php'; ?>
	<?php require 'bd/conectaBD.php'; ?>
	
	<div class="p-main p-container" style="margin-left:270px;margin-top:130px;">

	<div class="p-panel p-padding-large p-card-4 p-light-grey">

	  <p class="p-large">
	  <div class="p-code cssHigh notranslate">
	
		<?php

		date_default_timezone_set("America/Sao_Paulo");
		$data = date("d/m/Y H:i:s",time());
		echo "<p class='p-small' > ";
		echo "Acesso em: ";
		echo $data;
		echo "</p> "
		?>
		<div class="p-container p-theme">
		<h2>Atualização de Cliente</h2>
		</div>

		<!-- Acesso ao BD-->
		<?php
			// Recebe os dados que foram preenchidos no formulário
			$id      = $_POST['Id'];  // identifica o item a ser alterado
			$nome    = $_POST['Nome'];
			$CPF     = $_POST['CPF'];
			$dtNasc  = $_POST['DataNasc'];
			$proced   = $_POST['Procedimento'];

			// Cria conexão
			$conn = new mysqli($servername, $username, $password, $database);

			// Verifica conexão
			if ($conn->connect_error) {
				die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
			}
			?>
			
			<?php
	
				$sql = "UPDATE clientes SET Nome = '$nome', CPF = '$CPF', Dt_Nasc = '$dtNasc' WHERE ID_Cliente = $id";

			echo "<div class='p-responsive p-card-4'>";
			if ($result = $conn->query($sql)) {
				echo "<p>&nbsp;Registro alterado com sucesso! </p>";
			} else {
				echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn->connect_error . "</p>";
			}
			echo "</div>";
			$conn->close(); //Encerra conexao com o BD
		?>
	  </div>
	</div>

	<?php require 'geral/sobre.php';?>
	<!-- FIM PRINCIPAL -->
	</div>
	<!-- Inclui RODAPE  -->
	<?php require 'geral/rodape.php';?>

</body>
</html>
