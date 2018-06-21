<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         
        <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Desha Prenotazione Eseguita
        </title>
    </head>
    <body>
        <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
            
                <img src="../Images/Logo%20Desha.jpg" width="48" height="48" href="www.dayoga.it">
            </a>
        </div>
        <?php
        include('../dbconnection.php');
        session_start();
        $UtentePrenotante = $_SESSION["Id_Utente"];
        $Prenotazione = $_SESSION['PrenotazioneDesiderata'];
        $Cancellazione = mysqli_query($connection, "DELETE FROM prenotazione WHERE prenotazione.Id_Prenotazione = $Prenotazione");
        if($Cancellazione > 0){
            echo "Cancellazione andata a buon termine! Controlla le <a href='LookPrenotazioni.php'>prenotazioni</a>";
        }
        else{
            echo "NINTA DA FER";
        }
    ?>   
    </body>
</html>