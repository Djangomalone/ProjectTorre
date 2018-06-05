<htm>
    <head>
        <title>
            Desha Prenotazione Eseguita
        </title>
    </head>
    <body>
        <?php
        include('../dbconnection.php');
        session_start();
        $UtentePrenotante = $_SESSION["Id_Utente"];
        $Lezione = $_SESSION['LezioneDesiderata'];
        $Inserimento = mysqli_query($connection, "INSERT INTO `prenotazione` (`Id_Prenotazione`, `Id_Utente_Prenotazione`, `Id_Lezione_Prenotazione`) VALUES (NULL, '$UtentePrenotante', '$Lezione');");
        if($Inserimento > 0){
            echo "Inserimento andato a buon termine! Controlla le <a href='LookPrenotazioni.php'>prenotazioni</a>";
        }
        else{
            echo "NINTA DA FER";
        }
    ?>   
    </body>
</htm>