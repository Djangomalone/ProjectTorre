<html>
    <head>
        <title>
            Password Cambiata
        </title>
    </head>
    <body>
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
                    $ModificaLezione = mysqli_query($connection, "UPDATE `admin` SET `Password` = '$Pass_Cript'");
                    echo "Password cambiata con successo! Prego, effettuate con la nuova password il <a href='index.php'>login</a>";
                }
                else if($Tabella == 'U'){
                    $ModificaLezione = mysqli_query($connection, "UPDATE `utente` SET `Password` = '$Pass_Cript'");
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
    </body>
</html>