<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">
        <link rel="shortcut icon" href="../Images/Desha%20browser.jpg">
        <meta charset="UTF-8">
        <title>
            Desha Home Page
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
        $LezioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottonePrenota']);
        $_SESSION['LezioneDesiderata'] = $LezioneDesiderata;
        $ResultL = mysqli_query($connection, "SELECT * FROM lezione WHERE Id_Lezione = '$LezioneDesiderata'");
        $ResultC = mysqli_query($connection, "SELECT * FROM prenotazione WHERE Id_Lezione_Prenotazione = '$LezioneDesiderata' AND Id_Utente_Prenotazione = ". $_SESSION['Id_Utente'] ."");
        $LRighe = mysqli_num_rows($ResultL);
        $CRighe = mysqli_num_rows($ResultC);
        if($CRighe > 0){
            echo "Prenotazione già effettuata. <a href='MakePrenotazioni.php'>Effettuane un'altra</a>";
        }
        else{
            if($LRighe > 0){
                while($rowL = $ResultL->fetch_assoc()){
                    echo "Confermi di voler prenotare questa lezione? <br><br> Data: ". $rowL['Data_Lezione'] ." Ora: ". $rowL['Ora_Lezione'] ." Descrizione: ". $rowL['Descrizione'] ."<br><br>";
                    echo "<form method='post' action='MakePrenotazioni.php'> <button class='button' type='submit' name='bottoneIndietro'> Torna indietro</button></form>";
                    echo "<form method='post' action='PrenotazioneEseguita.php'><button class='button' type='submit' name='bottoneAvanti'>Conferma</button></form>";
                }
            }   
        }
        
    ?>
        </div>
    </body>
</html>