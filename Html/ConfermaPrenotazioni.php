<html>
    <?php
        include('dbconnection.php');
        session_start();
        $LezioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottonePrenota']);
        $_SESSION['LezioneDesiderata'] = $LezioneDesiderata;
        $ResultL = mysqli_query($connection, "SELECT * FROM lezione WHERE Id_Lezione = '$LezioneDesiderata'");
        $LRighe = mysqli_num_rows($ResultL);
        if($LRighe > 0){
            while($rowL = $ResultL->fetch_assoc()){
                echo "Confermi di voler prenotare questa lezione? <br><br> Data: ". $rowL['Data_Lezione'] ." Ora: ". $rowL['Ora_Lezione'] ." Descrizione: ". $rowL['Descrizione'] ."<br>";
                echo "<form method='post' action='MakePrenotazioni.php'> <button type='submit' name='bottoneIndietro'> Torna indietro</button></form>";
                echo "<form method='post' action='PrenotazioneEseguita.php'><button type='submit' name='bottoneAvanti'>Conferma</button></form>";
                
            }
        }
    ?>
</html>