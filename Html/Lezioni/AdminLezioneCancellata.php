<htm>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Admin Cancellazione 
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
        $Lezione = $_SESSION['LezioneDesiderata'];
        $CancellazionePrenotazioni = mysqli_query($connection, "DELETE FROM prenotazione WHERE Id_Lezione_Prenotazione = $Lezione");
        $CancellazioneLezione = mysqli_query($connection, "DELETE FROM lezione WHERE Id_Lezione = $Lezione");
        if($CancellazioneLezione > 0){
            echo "Cancellazione andata a buon termine! Torna alla pagina <a href='AdminControllaLezioni.php'>lezioni</a>";
        }
        else{
            echo "NINTA DA FER";
        }
    ?>   
        </div>
    </body>
</htm>