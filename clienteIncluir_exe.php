<!DOCTYPE html>
<html>
<head>
	<title>Terapia Capilar</title>
	<link rel="shortcut icon" type="favicon" href="imagens/favicon.ico"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body onload="p_show_nav('menuCliente')">

	<!-- Inclui MENU  -->
	<?php require 'geral/menu.php'; ?>
	<?php require 'bd/conectaBD.php'; ?>

	
	<div class="p-main p-container" style="margin-left:270px;margin-top:130px;">

		<div class="p-panel p-padding-large p-card-4 p-light-grey">
			<p class="p-large">
			<div class="p-code cssHigh notranslate">

			
				<?php
				date_default_timezone_set("America/Sao_Paulo");
				$data = date("d/m/Y H:i:s", time());
				echo "<p class='p-small' > ";
				echo "Acesso em: ";
				echo $data;
				echo "</p> "
				?>

				<!-- Acesso ao BD-->
				<?php
				$nome    = $_POST['Nome'];
				$CPF     = $_POST['CPF'];
				$dtNasc  = $_POST['DataNasc'];
				$proced   = $_POST['Procedimento'];
				$dtProced = $_POST['DataProced'];

				// Cria conexão
				$conn = new mysqli($servername, $username, $password, $database);

				// Verifica conexão
				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}
				// Faz Select na Base de Dados

					$sql = "INSERT INTO clientes (Nome, CPF, Dt_Nasc, ID_Proced, Dt_Proced) VALUES ('$nome','$CPF','$dtNasc', '$proced', '$dtProced')";
				
				?>
				<div class='p-responsive p-card-4'>
					<div class="p-container p-theme">
						<h2>Inclusão de Novo Cliente</h2>
					</div>
					<?php
					if ($result = $conn->query($sql)) {
						echo "<p>&nbsp;Registro cadastrado com sucesso! </p>";
					} else {
						echo "<p style='text-align:center'>Erro executando INSERT: " . $conn->connect_error . "</p>";
					}
					echo "</div>";
					$conn->close();  //Encerra conexao com o BD

					?>
				</div>
			</div>

			<?php require 'geral/sobre.php'; ?>
			<!-- FIM PRINCIPAL -->
		</div>
		<!-- Inclui RODAPE  -->
		<?php require 'geral/rodape.php'; ?>

</body>

</html>