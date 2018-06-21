<html>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Admin Controlla Lezioni
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
            $Lezioni = mysqli_query($connection, "SELECT * FROM presenza JOIN admin ON (Id_Admin_Presenza = Id_Admin) JOIN utente ON (Id_Utente_Presenza = Id_Utente) JOIN lezione ON (Id_Lezione_Presenza = Id_Lezione) ORDER BY Data_Lezione DESC");
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
                                    Data
                                </th>
                                <th>
                                    Ora
                                </th>
                                <th>
                                    Descrizione
                                </th>
                                <th>
                                    Tenuta da
                                </th>
                            </tr>";
                    while($row = $Lezioni->fetch_assoc()){
                        $DataGirata = date("d-m-Y", strtotime($row["Data_Lezione"]));
                        echo "
                            <tr>
                            <td>
                            " . $row["NomeUtente"] . "
                            </td>
                            <td>
                            " . $row["CognomeUtente"] . "
                            </td>
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
                            ". $row["NomeAdmin"] . "
                            </td>
                            </tr>";
                    }
                }   
                else {
                    echo "Nessuna presenza presente. <a href='AdminSegnaPresenze.php'>Segnane subito una!</a>";
                }
        ?>
        <form action="AdminPresenze.php">
            <button>
                Menù Presenze
            </button>
        </form>
    </body>
</html>