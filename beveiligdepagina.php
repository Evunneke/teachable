<?php
    session_start();
    
    if(isset($_SESSION["sessiegebruikersnaam"]) && isset($_SESSION["sessiewachtwoord"]))
    {
        echo("U hebt nu toegang tot deze pagina.<br>");
        echo("Je bent ingelogd met gebruikersnaam: ".$_SESSION["sessiegebruikersnaam"]."<br><br>");
        echo("Klik <a href=\"logout.php\">hier</a> om uit te loggen.");
    }
    else
    {
        echo("U bent niet langs de login pagina gepasseerd of hebt een verkeerde login en wachtwoord opgegeven. Je heb geen toegang tot deze pagina.<br><br>");
        echo("Ga langs op <a href=\"login.php\"> deze</a> pagina.");
    }
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Beveiligde pagina</title>
		<script src=".js"></script>
		<link rel="stylesheet"	type="text/css" href=".css" />
	</head>
	<body>

	</body>
</html> 