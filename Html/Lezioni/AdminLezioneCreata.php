<html>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Creazione Lezione
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
            $Id_Admin = mysqli_real_escape_string($connection, $_POST['Maestro']);
            $Descrizione = mysqli_real_escape_string($connection, $_POST['DescrizioneLezione']);
            $ResultControllo = mysqli_query($connection, "SELECT * FROM lezione WHERE Data_Lezione = '$Data' AND Ora_Lezione = '$Ora'");
            $NRigheControllo = mysqli_num_rows($ResultControllo);
            if($NRigheControllo>0){
                echo "LEZIONE ESISTENTE. INSERIRNE UN'ALTRA";
                echo "<form action='AdminCreaLezioni.php'><button>Torna indietro</button></form>";
            }
            else{
                $Inserimento = mysqli_query($connection, "INSERT INTO `lezione` (`Id_Lezione`, `Id_Admin_Lezione`, `Data_Lezione`, `Ora_Lezione`, `Descrizione`) VALUES (NULL, '$Id_Admin', '$Data', '$Ora', '$Descrizione')");
                if($Inserimento > 0){
                    echo "Inserimento andato a buon fine. Torna al <a href='AdminLezioni.php'>menù lezioni</a>";
                }
                else{
                    echo "NINTA DA FER";
                }
            }
        ?>
    </body>
</html>