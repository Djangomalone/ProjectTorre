<html>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Admin Controlla Prenotazioni
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
            $Data = date("Y-m-d");
            $Id = $_SESSION['Id_Admin'];
            $Prenotazioni = mysqli_query($connection, "SELECT * FROM prenotazione JOIN utente ON (prenotazione.Id_Utente_Prenotazione = utente.Id_Utente) JOIN lezione ON (prenotazione.Id_Lezione_Prenotazione = lezione.Id_Lezione) WHERE Data_Lezione > '$Data' AND Id_Admin_Lezione = $Id ORDER BY Data_Lezione");
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
                                    Descrizione
                                </th>
                                <th>
                                    Nome Utente
                                </th>
                                <th>
                                    Cognome Utente
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
                            ". $row["NomeUtente"] . "
                            </td>
                            <td>
                            ". $row["CognomeUtente"] . "
                            </td>
                            </tr>";
                    }
                }   
                else {
                    echo "Nessuna prenotazione presente per le tue lezioni!";
                }
        ?>
        <form action="../HomePage.php">
            <button>
                Home
            </button>
        </form>
    </body>
</html>