<?php
    session_start();

    echo("<b><u>Welkom op de registratie pagina...</u></b><br><br>");
    
    if(!empty($_POST))
    {
        echo("Je gegevens zijn weggeschreven in de database<br>");
        echo("Als je een nieuwe gebruiker wilt registreren kan dat hieronder.<br>");
        echo("Klik anders <a href=\"login.php\">hier</a> om in te loggen");
        
        $_SESSION["sessiegebruikersnaam"]=$_POST["gebruiker"];
        $_SESSION["sessiewachtwoord"]=$_POST["wachtwoord"];   
    }
    else
    {
        echo("Geef de login gegevens die je wenst te gebruiken als nieuwe user.");
    }
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registratie pagina</title>
		<script src=".js"></script>
		<link rel="stylesheet"	type="text/css" href=".css" />
	</head>
        <form name="formLogin" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">   
        <br>
            Inlognaam: <input type="text" name="gebruiker"><br>
            Wachtwoord: <input type="password" name="wachtwoord"><br>
            <hr>
            <input type="submit" name="registeren" value="Registeren">
            <input type="reset" value="Leegmaken">
        </form>

        <?php
            // Leg verbinding met de MySQL-database.
            $link = mysqli_connect("localhost", "root", "", "website2")
                        or die("Fout: " .mysqli_connect_error());

            function checkInput($data)
            {
                global $link;
        
                // White spaces wissen (vooraan en achteraan).
                $data = trim($data);
        
                // Speciale tekens omzetten naar de HTML-versie. 
                // Bijvoorbeeld: < is gelijk aan &lt;
                $data = htmlspecialchars($data);
        
                // MySQL-injection vermijden (door te 'escapen').
                $data = mysqli_real_escape_string($link, $data);
        
                return $data;
            }

            if(!empty($_POST["gebruiker"]))
            {
                $gebruiker = $_POST["gebruiker"];
                $wachtwoord =$_POST["wachtwoord"];
                $wachtwoord = password_hash($_POST["wachtwoord"],PASSWORD_DEFAULT);
                $query = "INSERT INTO users (email, wachtwoord) 
                            VALUES ('".$gebruiker."','".$wachtwoord."')";

                mysqli_query($link, $query);
                
            }
            // Als er error zijn, toon ze
            if(mysqli_error($link))
                echo mysqli_error($link);
        ?>
	    </body>
</html> 