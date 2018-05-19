<html>
    <head>
        <title>
            Desha Controlla Prenotazioni
        </title>
    </head>
    <body>
        <?php
            include('dbconnection.php');
            session_start();
            $Data = date("Y-m-d");
            $Prenotazioni = mysqli_query($connection, "SELECT * FROM prenotazione JOIN utente ON (prenotazione.Id_Utente_Prenotazione = utente.Id_Utente) JOIN lezione ON (prenotazione.Id_Lezione_Prenotazione = lezione.Id_Lezione) WHERE Id_Utente = '" . $_SESSION['Id_Utente'] . "' AND Data_Lezione > '$Data'");
            $NPrenotazioni = mysqli_num_rows($Prenotazioni);
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
                                    Tenuta da
                                </th>
                                <th>
                                    Descrizione
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
                            </tr>";
                    }
                }   
                else {
                    echo "Nessuna lezione prenotata. <a href='MakePrenotazioni.php'>Prenotane subito una!</a>";
                }
        ?>
        <button href="HomePage.php">Home 
        </button>
    </body>
</html>