<?php
    session_start();
    session_unset();
    session_destroy();      
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Log-out pagina</title>
		<script src=".js"></script>
		<link rel="stylesheet"	type="text/css" href=".css" />
	</head>
	<body>
        <?php 
            echo("je bent nu uitgelogd. Je kan je terug aanmelden via <a href=\"login.php\">deze</a> pagina.");
        ?>
	</body>
</html> 