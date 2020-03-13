<?php
    session_start();

    echo("<b><u>Welkom op de log-in pagina...</u></b><br><br>");
    if(!empty($_POST))
    {
        echo("U hebt een verkeerde login of wachtwoord opgegeven.<br>");
    }
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Log-in pagina</title>
		<script src=".js"></script>
		<link rel="stylesheet"	type="text/css" href=".css" />
	</head>
	
	<body>
        Nieuwe gebruiker? <a href="registreren.php"> hier kunt u zich registeren</a>
        
        <form name="formLogin" method="post" action="login.php">   
        <br>
            Inlognaam: <input type="text" name="gebruiker"><br>
            Wachtwoord: <input type="password" name="wachtwoord"><br>
            <hr>
            <input type="submit" name="inloggen" value="Inloggen">
            <input type="reset" value="Leegmaken">
        </form>

        <?php
            // Leg verbinding met de MySQL-database.
            $link = mysqli_connect("localhost", "root", "", "website2")
                        or die("Fout: " .mysqli_connect_error());

            if(!empty($_POST["gebruiker"]))
            {   
                $gebruiker = $_POST["gebruiker"];
                $wachtwoord = $_POST["wachtwoord"];

                $query = "SELECT * FROM users WHERE email = '".$gebruiker."'";
                
                $gebruiker = mysqli_fetch_array($query);
                if(password_verify($wachtwoord, $gebruiker["wachtwoord"]) )    
                        {
                            $_SESSION["sessiegebruikersnaam"]=$gebruiker["email"];
                            header("Location: beveiligdepagina.php");
                        }
                else
                    echo("U hebt een verkeerde login of wachtwoord opgegeven.<br>");

            }
            // Als er error zijn, toon ze
            if(mysqli_error($link))
                echo mysqli_error($link);
        ?>
	</body>
</html> 