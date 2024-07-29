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
	<?php require 'geral/menu.php';?>
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
		<h2>Exclusão de Cliente</h2>
		</div>

		<!-- Acesso ao BD-->
		<?php
					
			// Cria conexão
			$conn = mysqli_connect($servername, $username, $password, $database);

			// ID do registro a ser excluído
			$id = $_POST['Id'];

			// Verifica conexão
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Faz DELETE na Base de Dados
			$sql = "DELETE FROM clientes WHERE ID_Cliente = $id";

			echo "<div class='p-responsive p-card-4'>";
			if ($result = mysqli_query($conn, $sql)) {
				echo "<p>&nbsp;Registro excluído com sucesso! </p>";
			} else {
				echo "<p>&nbsp;Erro executando DELETE: " . $conn->connect_error . "</p>";
			}
			echo "</div>";
			mysqli_close($conn);  //Encerra conexao com o BD

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
