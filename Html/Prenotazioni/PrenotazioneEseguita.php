<htm>
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
        </div>
        <div class="ParteCentrale">
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
        </div>
    </body>
</htm>