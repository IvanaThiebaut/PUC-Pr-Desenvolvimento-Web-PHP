<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Terapia Capilar</title>
    <link rel="shortcut icon" type="favicon" href="imagens/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body onload="p_show_nav('menuCliente')">

    <!-- Inclui MENU  -->
    <?php require 'geral/menu.php'; ?>
    <?php require 'bd/conectaBD.php'; ?>

    <div class="p-main p-container" style="margin-left:270px;margin-top:180px;">
        <div class="p-panel p-padding-large p-card-4 p-light-green">
            <p class="p-large">
            <p>
            <div class="p-code cssHigh notranslate">

               
                <?php
                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
                echo "<p class='p-small' > ";
                echo "Acesso em: ";
                echo $data;
                echo "</p> "
                ?>
                <div class="p-container">
                    <h2 class="fontTitulo">Listagem de Clientes</h2>
                </div>

                <!-- Acesso ao BD-->
                <?php
                // Cria conexão
                $conn = new mysqli($servername, $username, $password, $database);

                // Verifica conexão 
                if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

                // Faz Select na Base de Dados
                $sql = "SELECT ID_Cliente, CPF, Nome, Nome_Proced AS procedimentos, Dt_Proced, Dt_Nasc, Nome_Proced FROM clientes AS C INNER JOIN procedimentos AS P ON (C.ID_Proced = P.ID_Proced) ORDER BY C.Dt_Proced";
                $result = $conn->query($sql);
                echo "<div class='p-responsive p-card-4'>";
                if ($result->num_rows >0) {
                    echo "<table class='p-table-all'>";
                    echo "	<tr>";
                    echo "	  <th width='7%'>Código</th>";
                    echo "	  <th width='14%'>CPF</th>";
                    echo "	  <th width='14%'>Nome Cliente</th>";
                    echo "	  <th width='14%'>Data Procedimento</th>";
                    echo "	  <th width='15%'>Procedimento</th>";
                    echo "	  <th width='10%'>Nascimento</th>";
                    echo "	  <th width='8%'>Idade</th>";
                    echo "	  <th width='7%'> </th>";
                    echo "	  <th width='7%'> </th>";
                    echo "	</tr>";
                    // Apresenta cada linha da tabela
                    while ($row = $result->fetch_assoc()) {
                        $data = $row['Dt_Nasc'];
                        list($ano, $mes, $dia) = explode('-', $data);
                        $nova_data = $dia . '/' . $mes . '/' . $ano;
                        // data atual
                        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                        // Descobre a unix timestamp da data de nascimento do fulano
                        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
                        // cálculo
                        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
                        $cod = $row["ID_Cliente"];
                        echo "<tr>";
                        echo "<td>";
                        echo $cod;
                        echo "</td><td>";
                        echo $row["CPF"];
                        echo "</td><td>";
                        echo $row["Nome"];
                        echo "</td><td>";
                        echo $row["Dt_Proced"];
                        echo "</td><td>";
                        echo $row["Nome_Proced"];
                        echo "</td><td>";
                        echo $nova_data;
                        echo "</td><td>";
                        echo $idade;
                        echo "</td>";
                        //Atualizar e Excluir registro de médicos
                            ?>
                            <td>
                                <a href='clienteAtualizar.php?id=<?php echo $cod; ?>'><img src='imagens/edit_icon.svg' title='Editar Cliente' width='32'></a>
                            </td>
                            <td>
                                <a href='clienteExcluir.php?id=<?php echo $cod; ?>'><img src='imagens/DELETE - GARBAGE CAN.svg' title='Excluir Cliente' width='32'></a>
                            </td>
                            </tr>
                    <?php
                    }
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p style='text-align:center'>Erro executando SELECT: " . $conn->connect_error . "</p>";
                }
                $conn->close();
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