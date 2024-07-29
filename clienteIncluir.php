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

				// Obtém as Especialidades Médicas na Base de Dados para um combo box
				$sqlG = "SELECT ID_Proced, Nome_Proced FROM procedimentos";
				$result = $conn->query($sqlG);
				$optionsProced = array();

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						array_push($optionsProced, "\t\t\t<option value='" . $row["ID_Proced"] . "'>" . $row["Nome_Proced"] . "</option>\n");
					}
				} else {
					echo "Erro executando SELECT: " . $conn->connect_error;
				}
				$conn->close();
				?>
				<div class="p-responsive">
					<div class="p-container">
						<h2 class="fontTitulo">Informe os dados do novo do Cliente</h2>
					</div>
					<form class="p-container" action="clienteIncluir_exe.php" method="post" enctype="multipart/form-data">
						<table class='p-table-all'>
						<tr>
						<td style="width:50%;">
							<br>
						<p>
							<label class="fontTexto"><b>Nome</b>*</label>
							<input class="p-light-grey" name="Nome" id="Nome" type="text" placeholder="Coloque o nome do cliente" title="Nome entre 5 e 100 letras." pattern="[a-zA-Z\u00C0-\u00FF ]{5,100}$" required>
						</p>
						<p>
							<label class="fontTexto"><b>CPF</b>*</label>
							<input class="p-light-grey" name="CPF" id="CPF" type="text" maxlength="15" placeholder="XXX.XXX.XXX-XX" title="XXX.XXX.XXX-XX" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" required>
						</p>
						<p>
							<label class="fontTexto"><b>Data de Nascimento</b></label>
							<input class="p-light-grey" name="DataNasc" type="date" placeholder="dd/mm/aaaa" title="dd/mm/aaaa">
						</p>
						<p>
							<label class="fontTexto"><b>Procedimento</b>*</label>
							<select name="Procedimento" id="Procedimento" class="p-light-grey" required>
								<option value=""></option>
								<?php
								foreach ($optionsProced as $key => $value) {
									echo $value;
								}
								?>
							</select>
						</p>
						</td>
						<td>
							<br>
						<p>
							<label class="fontTexto"><b>Data do Procedimento</b></label>
							<input class="p-light-grey" name="DataProced" type="date" placeholder="dd/mm/aaaa" title="dd/mm/aaaa">
						</p>
						</td>
						</tr>
						<tr>
						<td colspan="2" style="text-align:center">
						<p>
							<input type="submit" value="Salvar" class="p-btn p-theme fontTexto">
							<input type="button" value="Cancelar" class="p-btn p-theme fontTexto" onclick="window.location.href='clienteListar.php'">
						</p>
						</td>
						</tr>
						</table>
					</form>
					<br>
				</div>
			</div>
			</p>
		</div>

		<?php require 'geral/sobre.php'; ?>
		<!-- FIM PRINCIPAL -->
	</div>
	<!-- Inclui RODAPE  -->
	<?php require 'geral/rodape.php'; ?>
</body>
</html>