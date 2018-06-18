<html>
    <head>
        <title>
            Presenza segnata
        </title>
    </head>
    <body>
        <?php
            include('dbconnection.php');
            session_start();
            $Data = date("d-m-Y");
            $DataA = mysqli_real_escape_string($connection, $_POST['DataAtt']);
            $DataS = mysqli_real_escape_string($connection, $_POST['DataScad']);
            $Nome = mysqli_real_escape_string($connection, $_POST['NomeUtente']);
            $Cognome = mysqli_real_escape_string($connection, $_POST['CognomeUtente']);
            $NLezioni = mysqli_real_escape_string($connection, $_POST['NLezioni']);
            $Descrizione = mysqli_real_escape_string($connection, $_POST['DescrizioneAbbonamento']);
            $Admin = $_SESSION['Id_Admin'];
            $ControlloUtente = mysqli_query($connection, "SELECT * FROM utente WHERE NomeUtente = '$Nome' AND CognomeUtente = '$Cognome'");
            $NUtente = mysqli_num_rows($ControlloUtente);
            if($NUtente > 0){
                while($row = $ControlloUtente->fetch_assoc()){
                        $Utente = $row['Id_Utente'];
                    }
                if($DataS>DataA){
                    $ControlloAbbonamento = mysqli_query($connection, "SELECT * FROM abbonamento WHERE Id_Utente_Abbonamento = '$Utente' AND Data_Scadenza > $Data AND Lazioni_Rimaste<=(SELECT)");
                    $NAbbonamento = mysqli_num_rows($ControlloAbbonamento;
                    if($NAbbonamento>0){
                        echo "L'abbonamento precedente è ancora attivo! Prego, <a href='AdminCreaAbbonamenti.php'>riprovare</a>";
                    }
                    else{
                        $Inserimento = mysqli_query($connection, "INSERT INTO `presenza` (`Id_Presenza`, `Id_Utente_Presenza`, `Id_Admin_Presenza`, `Id_Lezione_Presenza`) VALUES (NULL, '$Utente', '$Admin', '$Lezione')");
                        if($Inserimento>0){
                            echo "Inserimento andato a buon termine! <a href='AdminSegnaPresenze.php'>Segna un'altra presenza</a>";
                        }
                        else{
                            echo "NINTA DA FER";
                        }
                    }
                }
                else{
                    echo "Data di scadenza e di attivazione non corrette Prego, <a href='AdminCreaAbbonamenti.php'>riprovare</a>";
                }
            }
            else{
                echo "Utente non esistente! Prego, <a href='AdminCreaAbbonamenti.php'>riprovare</a>";
            } 
        ?>
    </body>
</html>