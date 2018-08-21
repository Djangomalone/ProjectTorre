<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         
        <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Modifica Lezione
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
            $Data = mysqli_real_escape_string($connection, $_POST['DataLezione']);
            $Ora = mysqli_real_escape_string($connection, $_POST['OraLezione']);
            $Descrizione = mysqli_real_escape_string($connection, $_POST['DescrizioneLezione']);
            $Pubblico = mysqli_real_escape_string($connection, $_POST['Pubblico']);
            $Id_Admin = mysqli_real_escape_string($connection, $_POST['Maestro']);
            $LezioneDesiderata = $_SESSION['LezioneDesiderata'];
            $ModificaLezione = mysqli_query($connection, "UPDATE `lezione` SET `Data_Lezione` = '$Data', `Ora_Lezione` = '$Ora', `Descrizione` = '$Descrizione', `Id_Admin_Lezione` = '$Id_Admin', `Pubblico` = '$Pubblico' WHERE `lezione`.`Id_Lezione` = $LezioneDesiderata");
            if($ModificaLezione){
                echo "Lezione modificata con successo! Torna alla pagina <a href='AdminControllaLezioni.php'>lezioni</a>";
            }
            else{
                echo "Ninta da fer";
            }
        ?>
        </div>
    </body>
</html>