<html>
    <head>
        <title>
            Utente creato
        </title>
    </head>
    <body>
        <?php
            include('dbconnection.php');
            session_start();
            $Nome = mysqli_real_escape_string($connection, $_POST['Nome']);
            $Cognome = mysqli_real_escape_string($connection, $_POST['Cognome']);
            $Email = mysqli_real_escape_string($connection, $_POST['Email']);
            $Cellulare = mysqli_real_escape_string($connection, $_POST['Cellulare']);
            $CodiceFiscale = mysqli_real_escape_string($connection, $_POST['Email']);
            $Indirizzo = mysqli_real_escape_string($connection, $_POST['Indirizzo']);
            $Password = mysqli_real_escape_string($connection, $_POST['Password']);
            $ConfermaPassword = mysqli_real_escape_string($connection, $_POST['ConfermaPassword']);
            $Controllo = mysqli_query($connection, "SELECT Email FROM utente WHERE Email = '$Email'");
            $NUtenti = mysqli_num_rows($Controllo);
            if($Password==$ConfermaPassword){
                if($NUtenti>0){
                    echo "Utente esistente. <a href='AdminCreaAccountU.php'>Immettere un altro utente</a>";
                }
                else{
                    $Inserimento = mysqli_query($connection, "INSERT INTO `utente` (`Id_Utente`, `NomeUtente`, `CognomeUtente`, `Email`, `Cellulare`, `CodFiscale`, `Indirizzo`, `Password`) VALUES (NULL, '$Nome', '$Cognome', '$Email', '$Cellulare', '$CodiceFiscale', '$Indirizzo'), , '$Password'");
                    if($Inserimento > 0){
                        echo "Inserimento andato a buon fine. Torna al <a href='AdminLezioni.php'>menù lezioni</a>";
                    }
                    else{
                        echo "QUALCOSA È ANDATO STORTO! <a href='AdminCreaAccountU.php'>Riprovare</a>";
                    }
                }
            }
            else{
                echo "Password e conferma password sbagliati. <a href='AdminCreaAccountU.php'>Prego riprovare</a>";
            }
        ?>
    </body>
</html>