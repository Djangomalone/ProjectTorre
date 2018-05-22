<html>
    <?php
        include('dbconnection.php');
        session_start();
        $PrenotazioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottoneCancella']);
        $_SESSION['PrenotazioneDesiderata'] = $PrenotazioneDesiderata;
        $ResultP = mysqli_query($connection, "SELECT * FROM prenotazione JOIN lezione ON (prenotazione.Id_Lezione_Prenotazione = lezione.Id_Lezione)WHERE Id_Prenotazione = '$PrenotazioneDesiderata'");
        $PRighe = mysqli_num_rows($ResultP);
        if($PRighe > 0){
            while($rowP = $ResultP->fetch_assoc()){
                echo "Confermi di voler cancellare questa prenotazione? <br><br> Data: ". $rowP['Data_Lezione'] ." Ora: ". $rowP['Ora_Lezione'] ." Descrizione: ". $rowP['Descrizione'] ."<br>";
                echo "<form method='post' action='LookPrenotazioni.php'> <button type='submit' name='bottoneIndietro'> Torna indietro</button></form>";
                echo "<form method='post' action='PrenotazioneCancellata.php'><button type='submit' name='bottoneAvanti'>Conferma</button></form>";
                
            }
        }
    ?>
</html>