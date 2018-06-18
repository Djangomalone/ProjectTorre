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
            $LezioniPresente = mysqli_query($connection, "SELECT * FROM presenza JOIN utente ON (presenza.Id_Utente_Presenza = utente.Id_Utente) JOIN lezione ON (presenza.Id_Lezione_Presenza = lezione.Id_Lezione) WHERE Id_Utente_Presenza = '" . $_SESSION["Id_Utente"] . "'");
            $NLezioni = mysqli_num_rows($LezioniPresente);
                if($NLezioni > 0){
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
                            </tr>";
                    while($row = $LezioniPresente->fetch_assoc()){
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
                    echo "Nessuna presenza a lezione!";
                }
        ?>
        <form action="../HomePage.php">
            <button>
                Home
            </button>
        </form>
    </body>
</html>