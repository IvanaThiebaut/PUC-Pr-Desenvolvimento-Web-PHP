<html>
	<head>
    <meta charset="UTF-8">
      <title>Terapia Capilar</title>
	  <link rel="shortcut icon" type="favicon" href="imagens/favicon.ico"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
	</head>
<body>

<?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    session_destroy();
    header('location: /TerapiaCapilarTesteCss/index.php');
    exit();
?>

</body>
</html>