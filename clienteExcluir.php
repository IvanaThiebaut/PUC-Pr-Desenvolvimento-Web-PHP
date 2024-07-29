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
				<!-- Acesso em:-->
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

				// Cria conexão
				$conn = new mysqli($servername, $username, $password, $database);
				// Verifica conexão
				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				$id = $_GET['id']; //Obtém a id do cliente que será excluído

				// Faz Select na Base de Dados
				$sql = "SELECT ID_Cliente, CPF, Nome, Nome_Proced AS procedimentos, Dt_Proced, Dt_Nasc FROM clientes AS C INNER JOIN procedimentos AS P ON (C.ID_Proced = P.ID_Proced) WHERE ID_Cliente = $id;";

				
				echo "<div class='p-responsive p-card-4'>";
				if ($result = $conn->query($sql)) {  // Consulta ao BD o
					if ($result->num_rows == 1) {          // Retorna 1 registro que será deletado  
						$row = $result->fetch_assoc();
						$dataN = explode('-', $row["Dt_Nasc"]);
						$ano = $dataN[0];
						$mes = $dataN[1];
						$dia = $dataN[2];
						$nova_data = $dia . '/' . $mes . '/' . $ano;
				?>
						<div class="p-container p-theme">
							<h2>Exclusão do Cliente Cód. = [<?php echo $row['ID_Cliente']; ?>]</h2>
						</div>
						<form class="p-container" action="clienteExcluir_exe.php" method="post" onsubmit="return check(this.form)">
							<input type="hidden" id="Id" name="Id" value="<?php echo $row['ID_Cliente']; ?>">
							<p>
							<label class="p-text-IE"><b>Nome: </b> <?php echo $row['Nome']; ?> </label>
							</p>
							<p>
							<label class="p-text-IE"><b>CPF: </b><?php echo $row['CPF']; ?></label>
							</p>
							<p>
							<label class="p-text-IE"><b>Data de Nascimento: </b><?php echo $nova_data; ?></label>
							</p>
							<p>
							<label class="p-text-IE"><b>Procedimento: </b><?php echo $row['procedimentos']; ?></label>
							</p>
							<p>
							<input type="submit" value="Confirma exclusão?" class="p-btn p-red">
							<input type="button" value="Cancelar" class="p-btn p-theme" onclick="window.location.href='clienteListar.php'">
							</p>
						</form>
					<?php
					} else { ?>
						<div class="p-container p-theme">
							<h2>Tentativa de exclusão de Cliente inexistente</h2>
						</div>
						<br>
				<?php }
				} else {
					echo "<p style='text-align:center'>Erro executando DELETE: " . $conn->connect_error . "</p>";
				}
				echo "</div>"; //Fim form
				$conn->close();  //Encerra conexao com o BD
				?>
			</div>
			</p>
		</div>
		<?php require 'geral/sobre.php'; ?>
		<!-- FIM PRINCIPAL -->
	</div>
	<!-- Inclui RODAPE -->
	<?php require 'geral/rodape.php'; ?>
</body>
</html>