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
            $Lezioni = mysqli_query($connection, "SELECT * FROM lezione JOIN admin ON (Id_Admin_Lezione = Id_Admin) WHERE Data_Lezione >= '$Data' ORDER BY Data_Lezione");
            $NLezioni = mysqli_num_rows($Lezioni);
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
                                <th>
                                    Tenuta da
                                </th>
                                <th>
                                    Modifica
                                </th>
                                <th>
                                    Cancella 
                                </th>
                            </tr>";
                    while($row = $Lezioni->fetch_assoc()){
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
                            ". $row["NomeAdmin"] . "
                            </td>
                            <form method = 'post' action='AdminModificaLezioni.php'>
                            <td>
                                <button type='submit' name='bottoneModifica' value=". $row["Id_Lezione"] .">
                                    Seleziona
                                </button>
                            </td>
                            </form>
                            <form method = 'post' action='AdminCancellaLezione.php'>
                            <td>
                                <button type='submit' name='bottoneCancella' value=". $row["Id_Lezione"] .">
                                    Seleziona
                                </button>
                            </td>
                            </form>
                            </tr>";
                    }
                }   
                else {
                    echo "Nessuna lezione presente. <a href='AdminCreaLezioni.php'>Creane subito una!</a>";
                }
        ?>
        <form action="AdminLezioni.php">
            <button>
                Menù Lezioni
            </button>
        </form>
    </body>
</html>