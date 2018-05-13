<html>
    <?php
        include('dbconnection.php');
        session_start();
        $LezioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottonePrenota']);
        $UtentePrenotante = $_SESSION["Id_Utente"];
        $ResultL = mysqli_query($connection, "SELECT * FROM lezione WHERE Id_Lezione = '$LezioneDesiderata'");
        $ResultU = mysqli_query($connection, "SELECT * FROM utente WHERE Id_Utente = $UtentePrenotante");
        $LRighe = mysqli_num_rows($ResultL);
        $URighe = mysqli_num_rows($ResultU);
        if($LRighe > 0){
            while($rowL = $ResultL->fetch_assoc()){
                echo "Confermi di voler prenotare questa lezione? <br><br> Data: ". $rowL['Data_Lezione'] ." Ora: ". $rowL['Ora_Lezione'] ." Descrizione: ". $rowL['Descrizione'] ."<br>";
                
            }
        }
    ?>
</html>