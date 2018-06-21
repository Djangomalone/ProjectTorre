<html>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Modifica Lezione
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
            $Data = mysqli_real_escape_string($connection, $_POST['DataLezione']);
            $Ora = mysqli_real_escape_string($connection, $_POST['OraLezione']);
            $Descrizione = mysqli_real_escape_string($connection, $_POST['DescrizioneLezione']);
            $Id_Admin = $_SESSION['Id_Admin'];
            $LezioneDesiderata = $_SESSION['LezioneDesiderata'];
            $ModificaLezione = mysqli_query($connection, "UPDATE `lezione` SET `Data_Lezione` = '$Data', `Ora_Lezione` = '$Ora', `Descrizione` = '$Descrizione', `Id_Admin_Lezione` = '$Id_Admin' WHERE `lezione`.`Id_Lezione` = $LezioneDesiderata");
            if($ModificaLezione){
                echo "Lezione modificata con successo! Torna alla pagina <a href='AdminControllaLezioni.php'>lezioni</a>";
            }
            else{
                echo "Ninta da fer";
            }
        ?>
    </body>
</html>