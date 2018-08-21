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
        <div class="ParteCentrale lezioni">
    <?php
        include('../dbconnection.php');
        session_start();
        $LezioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottoneModifica']);
        $_SESSION['LezioneDesiderata'] = $LezioneDesiderata;
        $Lezioni = mysqli_query($connection, "SELECT * FROM lezione WHERE Id_Lezione = '$LezioneDesiderata'");
        while($Arrow = $Lezioni->fetch_assoc()){
            $Data = $Arrow['Data_Lezione'];
            $Ora = $Arrow['Ora_Lezione'];
            $Descrizione = $Arrow['Descrizione'];
            $Maestro = $Arrow['Id_Admin_Lezione'];
            $Pubblico = $Arrow['Pubblico'];
        }
        echo "<form method='post' action='AdminLezioneModificata.php'>
        Inserisci data: <br>
        <input type='date' name='DataLezione' required value='$Data'><br>
        Inserisci ora: <br>
        <input type='time' name='OraLezione' required value='$Ora'><br>
        Inserisci una descrizione:<br>
        <input type='text' name='DescrizioneLezione' value='$Descrizione'><br>
        Inserisci il pubblico a cui è rivolta:<br>
        <select name='Pubblico' id='Selettore'>
            <option value='Tutti'>Tutti</option>
            <option value='Esordienti'>Esordienti</option>
            <option value='Esperti'>Esperti</option>
        </select><br>
        Inserisci Maestro:
        <select name='Maestro' id='Selettore'>";
                $Maestri = mysqli_query($connection, "SELECT * FROM admin");
                while($rowy = $Maestri->fetch_assoc()){
                    echo "<option value='". $rowy['Id_Admin'] ."'>". $rowy['NomeAdmin'] ."</option>";
                }
    echo "
        </select><br>
        <input class='button' type='submit' value='Modifica Lezione'>
    </form>";
    ?>
    
    <form action="AdminLezioni.php">
        <button class="button">
            Torna al menù lezioni
        </button>
    </form>
        </div>
    </body>
</html>