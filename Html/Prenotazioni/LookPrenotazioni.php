<html>
    <head>
        <title>
            Desha Controlla Prenotazioni
        </title>
    </head>
    <body>
        <?php
            include('../dbconnection.php');
            session_start();
            $Data = date("Y-m-d");
            $Prenotazioni = mysqli_query($connection, "SELECT * FROM prenotazione JOIN utente ON (prenotazione.Id_Utente_Prenotazione = utente.Id_Utente) JOIN lezione ON (prenotazione.Id_Lezione_Prenotazione = lezione.Id_Lezione) WHERE Id_Utente_Prenotazione = '" . $_SESSION['Id_Utente'] . "' AND Data_Lezione > '$Data'");
            $NPrenotazioni = mysqli_num_rows($Prenotazioni);
            echo "<form method = 'post' action='CancellaPrenotazione.php'>";
                if($NPrenotazioni > 0){
                    echo "
                        <table>
                            <tr>
                                <th>
                                    Data
                                </th>
                                <th>
                                    Ora
                                </th>
                                <th>
                                    Descrizione
                                </th>
                                <th>
                                    Cancella 
                                </th>
                            </tr>";
                    while($row = $Prenotazioni->fetch_assoc()){
                        $DataGirata = date("d-m-Y", strtotime($row["Data_Lezione"]));
                        echo "
                            <tr>
                            <td>
                            " . $DataGirata . "
                            </td>
                            <td>
                            " . $row["Ora_Lezione"] . "
                            </td>
                            <td>
                            ". $row["Descrizione"] . "
                            </td>
                            <td>
                                <button type='submit' name='bottoneCancella' value=". $row["Id_Prenotazione"] .">
                                    Seleziona
                                </button>
                            </td>
                            </tr>";
                    }
                }   
                else {
                    echo "Nessuna lezione prenotata. <a href='MakePrenotazioni.php'>Prenotane subito una!</a>";
                }
            echo "</form>";
        ?>
        <form action="../HomePage.php">
            <button>
                Home
            </button>
        </form>
    </body>
</html>