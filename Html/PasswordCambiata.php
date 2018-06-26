<html>
    <head><link rel="stylesheet" type="text/css" href="../CSS/TheCSS.css">         <link rel="shortcut icon" href="../Images/Desha%20browser.jpg">
        <title>
            Password Cambiata
        </title>
    </head>
    <body>
        <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
        </div>
        <div class="ParteCentrale">
        <?php
            include('dbconnection.php');
            session_start();
            $salt = "YL!_D55v@3cnL6Gro6dAvLRgADpSC)B%@enk_Orz";
            $Pass = mysqli_real_escape_string($connection, $_POST['NuovaPassword']);
            $NewPass = mysqli_real_escape_string($connection, $_POST['ConfermaNuovaPassword']);
            $Tabella = mysqli_real_escape_string($connection, $_POST['BottoneTabella']);
            if($Pass == $NewPass){
                $Pass_Cript = sha1($salt . $Pass);
                if($Tabella == 'A'){
                    $ModificaPasswordA = mysqli_query($connection, "UPDATE `admin` SET `Password` = '$Pass_Cript'");
                    echo "Password cambiata con successo! Prego, effettuate con la nuova password il <a href='index.php'>login</a>";
                }
                else if($Tabella == 'U'){
                    $ModificaPasswordU = mysqli_query($connection, "UPDATE `utente` SET `Password` = '$Pass_Cript'");
                    echo "Password cambiata con successo! Prego, effettuate con la nuova password il <a href='index.php'>login</a>";
                }
                else{
                    echo "Qualcosa è andato storto";
                }
            }
            else{
                echo "Le due password non coincidono! <a href='CambioPassword.php'>Riprova</a>";
            }
        ?>
        </div>
    </body>
</html>