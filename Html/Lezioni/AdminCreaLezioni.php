<html>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Crea Lezione
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
    <form method="post" action="AdminLezioneCreata.php">
        Inserisci data: <br>
        <input type="date" name="DataLezione" required><br>
        Inserisci ora: <br>
        <input type="time" name="OraLezione" required><br>
        Inserisci una descrizione:<br>
        <input type="text" name="DescrizioneLezione"><br>
        Inserisci Maestro:
        <select name="Maestro" id="Selettore">
            <?php
                include('../dbconnection.php');
                $Maestri = mysqli_query($connection, "SELECT * FROM admin");
                while($row = $Maestri->fetch_assoc()){
                    echo "<option value='". $row['Id_Admin'] ."'>". $row['NomeAdmin'] ."</option>";
                }
            ?>
        </select><br>
        <input type="submit" value="Crea Lezione">
    </form>
    <form action="AdminLezioni.php">
        <button>
            Torna al menù lezioni
        </button>
    </form>
    </body>
</html>