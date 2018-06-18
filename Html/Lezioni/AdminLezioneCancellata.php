<htm>
    <head>
        <title>
            Admin Cancellazione 
        </title>
    </head>
    <body>
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
    </body>
</htm>