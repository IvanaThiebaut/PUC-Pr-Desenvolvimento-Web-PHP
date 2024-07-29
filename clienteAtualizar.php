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
				$id = $_GET['id']; // Obtém id do cliente

				// Cria conexão
				$conn = new mysqli($servername, $username, $password, $database);

				// Verifica conexão 
				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				// Faz Select na Base de Dados
				$sql = "SELECT ID_Cliente, Nome, CPF, Dt_Nasc, ID_Proced, Dt_Proced FROM clientes WHERE ID_Cliente = $id";

				
				echo "<div class='p-responsive p-card-4'>";
				if ($result = $conn->query($sql)) {   // Consulta ao BD 
					if ($result->num_rows == 1) {   // Retorna 1 registro que será atualizado  
						$row = $result->fetch_assoc();

						$procedimento = $row['ID_Proced'];
						$id_cliente     = $row['ID_Cliente'];
						$nome          = $row['Nome'];
						$CPF           = $row['CPF'];
						$dataNasc      = $row['Dt_Nasc'];
						$dataProced          = $row['Dt_Proced'];

						// Obtém as procedimentos capilares na Base de Dados para um combo box
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

				?>
						<div class="p-container p-theme">
							<h2>Altere os dados do Cliente Cód. = [<?php echo $id_cliente; ?>]</h2>
						</div>
						<form class="p-container" action="clienteAtualizar_exe.php" method="post" enctype="multipart/form-data">
							<table class='p-table-all'>
								<tr>
									<td style="width:50%;">
										<p>
											<input type="hidden" id="Id" name="Id" value="<?php echo $id_cliente; ?>">
										</p>
										<br>
										<p>
										<label class="fontTexto"><b>Nome</b></label>
										<input class="p-light-grey" name="Nome" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" title="Nome entre 10 e 100 letras." value="<?php echo $nome; ?>" required>
										</p>
										<p>
										<label class="fontTexto"><b>CPF</b>*</label>
										<input class="p-light-grey " name="CPF" id="CPF" type="text" maxlength="15" placeholder="XXX.XXX.XXX-XX" title="XXX.XXX.XXX-XX" value="<?php echo $CPF; ?>" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" required>
										</p>
										<p>
										<label class="fontTexto"><b>Data de Nascimento</b></label>
										<input class="p-light-grey " name="DataNasc" type="date" placeholder="dd/mm/aaaa" title="dd/mm/aaaa" title="Formato: dd/mm/aaaa" value="<?php echo $dataNasc; ?>">
										</p>

										<p><label class="fontTexto"><b>Procedimento</b>*</label>
											<select name="Procedimento" id="Procedimento" class="p-light-grey " required>
											<?php
											foreach ($optionsProced as $key => $value) {
												echo $value;
											}
											?>
											</select>
										</p>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center">
									<p>
										<input type="submit" value="Alterar" class="p-btn p-red">
										<input type="button" value="Cancelar" class="p-btn p-theme" onclick="window.location.href='clienteListar.php'">
									</p>
									</td>
								</tr>
							</table>
							<br>
						</form>
					<?php
					} else { ?>
						<div class="p-container p-theme">
							<h2>Cliente inexistente</h2>
						</div>
						<br>
				<?php
					}
				} else {					
					echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn->connect_error . "</p>";
				}
				echo "</div>"; //Fim form
				$conn->close(); //Encerra conexao com o BD
				?>
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