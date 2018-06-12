<html>
    <head>
        <title>
            Modifica Lezione
        </title>
    </head>
    <?php
        include('dbconnection.php');
        session_start();
    echo "
        <form action='AdminPresenzaSegnata.php' method='post'>
        Inserisci data lezione:
        <select name='Data' id='Selettore'>";
                $Date = mysqli_query($connection, 'SELECT * FROM lezione');
                while($rowDate = $Date->fetch_assoc()){
                    echo "<option value='". $rowDate['Data_Lezione'] ."'>". $rowDate['Data_Lezione'] ."</option>";
                }
    echo "
        </select><br>
        Inserisci ora lezione: 
        <select name='Ora' id='Selettore'>";
                $Ora = mysqli_query($connection, 'SELECT * FROM lezione');
                while($rowOra = $Ora->fetch_assoc()){
                    echo "<option value='". $rowOra['Ora_Lezione'] ."'>". $rowOra['Ora_Lezione'] ."</option>";
                }
    
    echo "
        </select><br>
        Inserisci nome e cognome dell'utente: 
        <select name='NomeUtente' id='Selettore'>";
                $Nome = mysqli_query($connection, 'SELECT * FROM utente');
                while($rowNome = $Nome->fetch_assoc()){
                    echo "<option value='". $rowNome['NomeUtente'] ."'>". $rowNome['NomeUtente'] ."</option>";
                }
    echo "
        </select>
        <select name='CognomeUtente' id='Selettore'>";
                $Cognome = mysqli_query($connection, 'SELECT * FROM utente');
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
</html>