<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/TheCSS.css">
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
            
                <img src="../Images/Logo%20Desha.jpg" width="48" height="48" href="www.dayoga.it">
            </a>
        </div>
    <?php
        include('../dbconnection.php');
        session_start();
        $LezioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottoneCancella']);
        $_SESSION['LezioneDesiderata'] = $LezioneDesiderata;
        $ResultL = mysqli_query($connection, "SELECT * FROM lezione WHERE Id_Lezione = '$LezioneDesiderata'");
        $LRighe = mysqli_num_rows($ResultL);
        if($LRighe > 0){
            while($rowL = $ResultL->fetch_assoc()){
                echo "Confermi di voler cancellare questa Lezione? <br><br> Data: ". $rowL['Data_Lezione'] ." Ora: ". $rowL['Ora_Lezione'] ." Descrizione: ". $rowL['Descrizione'] ."<br>";
                echo "<form method='post' action='AdminControllaLezioni.php'> <button type='submit' name='bottoneIndietro'> Torna indietro</button></form>";
                echo "<form method='post' action='AdminLezioneCancellata.php'><button type='submit' name='bottoneAvanti'>Conferma</button></form>";
                
            }
        }
    ?>
    </body>
</html>