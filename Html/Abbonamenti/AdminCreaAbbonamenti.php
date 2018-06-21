<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         
        <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Crea Abbonamento
        </title>
        <?php 
            include('../dbconnection.php');
            session_start();
        ?>
    </head>
    <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
            
                <img src="../Images/Logo%20Desha.jpg" width="48" height="48" href="www.dayoga.it">
            </a>
        </div>
    <form method="post" action="AdminAbbonamentoCreato.php">
        Inserisci data di attivazione: <br>
        <input type="date" name="DataAtt" required><br>
        Inserisci data di scadenza: <br>
        <input type="date" name="DataScad" required><br>
        Inserisci nome e cognome dell'utente: 
        <select name='NomeUtente' id='Selettore'>
            <?php
                $Nome = mysqli_query($connection, 'SELECT DISTINCT NomeUtente FROM utente ORDER BY NomeUtente');
                while($rowNome = $Nome->fetch_assoc()){
                    echo "<option value='". $rowNome['NomeUtente'] ."'>". $rowNome['NomeUtente'] ."</option>";
                }
            ?>
        </select>
        <select name='CognomeUtente' id='Selettore'>
            <?php
                $Cognome = mysqli_query($connection, 'SELECT DISTINCT CognomeUtente FROM utente ORDER BY CognomeUtente');
                while($rowCognome = $Cognome->fetch_assoc()){
                    echo "<option value='". $rowCognome['CognomeUtente'] ."'>". $rowCognome['CognomeUtente'] ."</option>";
                }
            ?>
        </select><br>
        Inserisci una descrizione:<br>
        <input type="text" name="DescrizioneAbbonamento"><br>
        Inserisci il numero di lezioni:<br>
        <input type="number" name="NLezioni" min="4" max="40" value="4" required><br>
        <input type="submit" value="Crea abbonamento">
    </form>
    <form action="AdminAbbonamenti.php">
        <button>
            Torna al menù abbonamenti
        </button>
    </form>
</html>
        