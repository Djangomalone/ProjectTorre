<html>
    <head>
        <title>
            Admin Controlla Lezioni
        </title>
    </head>
    <body>
        <?php
            include('dbconnection.php');
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
                    echo "Nessuna lezione presente. <a href='AdminCreaLezioni.php'>Creane subito una!</a>";
                }
        ?>
        <form action="AdminPresenze.php">
            <button>
                Menù Presenze
            </button>
        </form>
    </body>
</html>