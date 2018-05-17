<htm>
    <body>
        <?php
        include('dbconnection.php');
        session_start();
        $UtentePrenotante = $_SESSION["Id_Utente"];
        $Lezione = $_SESSION['LezioneDesiderata'];
        $Inserimento = mysqli_query($connection, "INSERT INTO `prenotazione` (`Id_Prenotazione`, `Id_Utente_Prenotazione`, `Id_Lezione_Prenotazione`) VALUES (NULL, '$UtentePrenotante', '$Lezione');");
        if($Inserimento > 0){
            echo "Inserimento andato a buon termine! Torna alla <a href='MainPage.php'>home</a>";
        }
        else{
            echo "NINTA DA FER";
        }
    ?>   
    </body>
</htm>