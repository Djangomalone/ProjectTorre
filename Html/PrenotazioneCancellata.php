<htm>
    <head>
        <title>
            Desha Prenotazione Eseguita
        </title>
    </head>
    <body>
        <?php
        include('dbconnection.php');
        session_start();
        $UtentePrenotante = $_SESSION["Id_Utente"];
        $Prenotazione = $_SESSION['PrenotazioneDesiderata'];
        $Cancellazione = mysqli_query($connection, "DELETE FROM prenotazione WHERE prenotazione.Id_Prenotazione = $Prenotazione");
        if($Cancellazione > 0){
            echo "Cancellazione andata a buon termine! Torna alla <a href='HomePage.php'>home</a>";
        }
        else{
            echo "NINTA DA FER";
        }
    ?>   
    </body>
</htm>