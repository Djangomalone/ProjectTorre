<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         
        <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Admin Controlla Abbonamenti
        </title>
    </head>
    <body>
        <?php
            include('../dbconnection.php');
            session_start();
            $Data = date("Y-m-d");
            $Lezioni = mysqli_query($connection, "SELECT * FROM abbonamento JOIN utente ON (Id_Utente_Abbonamento = Id_Utente) ORDER BY 'Data_Scadenza' DESC");
            $NLezioni = mysqli_num_rows($Lezioni);
                if($NLezioni > 0){
                    echo "
                        <table>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Cognome
                                </th>
                                <th>
                                    Data Attivazione
                                </th>
                                <th>
                                    Data Scadenza
                                </th>
                                <th>
                                    Descrizione
                                </th>
                            </tr>";
                    while($row = $Lezioni->fetch_assoc()){
                        $DataGirataA = date("d-m-Y", strtotime($row["Data_Attivazione"]));
                        $DataGirataS = date("d-m-Y", strtotime($row["Data_Scadenza"]));
                        echo "
                            <tr>
                            <td>
                            " . $row["NomeUtente"] . "
                            </td>
                            <td>
                            " . $row["CognomeUtente"] . "
                            </td>
                            <td>
                            " . $DataGirataA . "
                            </td>
                            <td>
                            " . $DataGirataS . "
                            </td>
                            <td>
                            ". $row["Tipologia"] . "
                            </td>
                            </tr>";
                    }
                }   
                else {
                    echo "Nessuna abbonamento presente. <a href='AdminSegnaPresenze.php'>Creane subito uno!</a>";
                }
        ?>
        <form action="AdminAbbonamenti.php">
            <button>
                Menù Abbonamenti
            </button>
        </form>
    </body>
</html>