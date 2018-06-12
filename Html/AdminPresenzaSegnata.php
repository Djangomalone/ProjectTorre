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
            $Data = mysqli_real_escape_string($connection, $_POST['Data']);
            $Ora = mysqli_real_escape_string($connection, $_POST['Ora']);
            $Nome = mysqli_real_escape_string($connection, $_POST['NomeUtente']);
            $Cognome = mysqli_real_escape_string($connection, $_POST['CognomeUtente']);
            echo "$Nome $Cognome $Data $Ora";
            $Admin = $_SESSION['Id_Admin'];
            $ControlloUtente = mysqli_query($connection, "SELECT * FROM utente WHERE NomeUtente = '$Nome' AND CognomeUtente = '$Cognome'");
            $NUtente = mysqli_num_rows($ControlloUtente);
            $ControlloLezione = mysqli_query($connection, "SELECT * FROM lezione WHERE Data_Lezione = '$Data' AND Ora_Lezione = '$Ora'");
            $NLezione = mysqli_num_rows($ControlloLezione);
            if(NUtente > 0){
                while($row = $ControlloUtente->fetch_assoc()){
                        $Utente = $row['Id_Utente'];
                    }
                if(NLezione > 0){
                    while($row = $ControlloLezione->fetch_assoc()){
                        $Lezione = $row['Id_Lezione'];
                    }
                    $ControlloPresenza = mysqli_query($connection, "SELECT * FROM presenza WHERE Id_Lezione_Presenza = '$Lezione' AND Id_Utente_Presenza = '$Utente'");
                    $NPresenza = mysqli_num_rows($ControlloPresenza);
                    if($NPresenza>0){
                        echo "Presenza già inserita! Prego, <a href='AdminSegnaPresenze.php'>riprovare</a>";
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
                    echo "Lezione non esistente! Prego, <a href='AdminSegnaPresenze.php'>riprovare</a>";
                }
            }
            else{
                echo "Utente non esistente! Prego, <a href='AdminSegnaPresenze.php'>riprovare</a>";
            } 
        ?>
    </body>
</html>