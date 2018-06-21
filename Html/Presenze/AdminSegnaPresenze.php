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
        $Data = date("d");
        $DataPrecedente = $Data-7;
        $NewData = date("$DataPrecedente-m-Y");
        $DataGirata = date("Y-m-d", strtotime($NewData));
        
    echo "
        <form action='AdminPresenzaSegnata.php' method='post'>
        Inserisci data lezione:
        <select name='Data' id='Selettore'>";
                $Date = mysqli_query($connection, "SELECT DISTINCT Data_Lezione FROM lezione WHERE Data_Lezione > '$DataGirata' ORDER BY Data_Lezione");
                while($rowDate = $Date->fetch_assoc()){
                    $Data1 = date("d-m-Y", strtotime($rowDate['Data_Lezione']));
                    echo "<option value='". $rowDate['Data_Lezione'] ."'>". $Data1 ."</option>";
                }
    echo "
        </select><br>
        Inserisci ora lezione: 
        <select name='Ora' id='Selettore'>";
                $Ora = mysqli_query($connection, 'SELECT DISTINCT Ora_Lezione FROM lezione ORDER BY Ora_Lezione');
                while($rowOra = $Ora->fetch_assoc()){
                    echo "<option value='". $rowOra['Ora_Lezione'] ."'>". $rowOra['Ora_Lezione'] ."</option>";
                }
    
    echo "
        </select><br>
        Inserisci nome e cognome dell'utente: 
        <select name='NomeUtente' id='Selettore'>";
                $Nome = mysqli_query($connection, 'SELECT DISTINCT NomeUtente FROM utente ORDER BY NomeUtente');
                while($rowNome = $Nome->fetch_assoc()){
                    echo "<option value='". $rowNome['NomeUtente'] ."'>". $rowNome['NomeUtente'] ."</option>";
                }
    echo "
        </select>
        <select name='CognomeUtente' id='Selettore'>";
                $Cognome = mysqli_query($connection, 'SELECT DISTINCT CognomeUtente FROM utente ORDER BY CognomeUtente');
                while($rowCognome = $Cognome->fetch_assoc()){
                    echo "<option value='". $rowCognome['CognomeUtente'] ."'>". $rowCognome['CognomeUtente'] ."</option>";
                }
    echo "
        </select>
        <input type='submit' value='Segna presenza'>
    </form>";
    ?>
    
    <form action="AdminPresenze.php">
        <button>
            Torna al menù presenze
        </button>
    </form>
    </body>
</html>