<html>
    <head>
        <title>
            Modifica Lezione
        </title>
    </head>
    <?php
        include('dbconnection.php');
        $LezioneDesiderata = mysqli_real_escape_string($connection, $_POST['bottoneModifica']);
        $_SESSION['LezioneDesiderata'] = $LezioneDesiderata;
        $Lezioni = mysqli_query($connection, "SELECT * FROM lezione JOIN admin ON (Id_Admin_Lezione = Id_Admin) WHERE Id_Lezione = '$LezioneDesiderata'");
        while($Arrow = $Lezioni->fetch_assoc()){
            $Data = $Arrow['Data_Lezione'];
            $Ora = $Arrow['Ora_Lezione'];
            $Descrizione = $Arrow['Descrizione'];
            $Maestro = $Arrow['Id_Admin_Lezione'];
        }
        echo "<form method='post' action='AdminLezioneModificata.php'>
        Inserisci data: <br>
        <input type='date' name='DataLezione' required value='$Data'><br>
        Inserisci ora: <br>
        <input type='time' name='OraLezione' required value='$Ora'><br>
        Inserisci una descrizione:<br>
        <input type='text' name='DescrizioneLezione' value='$Descrizione'><br>
        Inserisci Maestro:
        <select name='Maestrp' id='Selettore'>";
                $Maestri = mysqli_query($connection, 'SELECT * FROM admin');
                while($row = $Maestri->fetch_assoc()){
                    echo '<option>'. $row['NomeAdmin'] .'</option>';
                }
    echo "
        </select><br>
        <input type='submit' value='Modifica Lezione'>
    </form>";
    ?>
    
    <form action="AdminLezioni.php">
        <button>
            Torna al menù lezioni
        </button>
    </form>
</html>