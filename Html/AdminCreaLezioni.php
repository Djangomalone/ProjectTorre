<html>
    <head>
        <title>
            Crea Lezione
        </title>
    </head>
    <form method="post" action="CreaLezione.php">
        Inserisci data: <br>
        <input type="date" name="DataLezione" required><br>
        Inserisci ora: <br>
        <input type="time" name="OraLezione" required><br>
        Inserisci una descrizione:<br>
        <input type="text" name="DescrizioneLezione"><br>
        <input type="submit" value="Crea Lezione">
        <select name="Maestrp" id="Selettore">
            <?php
                include('dbconnection.php');
                $Maestri = mysqli_query($connection, "SELECT * FROM admin");
                while($row = $Maestri->fetch_assoc()){
                    echo "<option>". $row['NomeAdmin'] ."</option>";
                }
            ?>
        </select>
    </form>
    <form action="AdminLezioni.php">
        <button>
            Torna al menù lezioni
        </button>
    </form>
</html>