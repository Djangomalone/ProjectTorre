<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         
        <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Desha MakePrenotazioni
        </title>
    </head>
    <body>
        <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
        </div>
    <div class='ParteCentrale'>
    <?php
        include('../dbconnection.php');
        $Data = date("Y-m-d");
        echo "<br>";
        $Result = mysqli_query($connection, "SELECT * FROM lezione JOIN admin ON (lezione.Id_Admin_Lezione = admin.Id_Admin) WHERE Data_Lezione > '$Data' ORDER BY Data_Lezione");
        $NRighe = mysqli_num_rows($Result);
        echo "
            <form method='post' action='ConfermaPrenotazioni.php'>
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
                    <th>
                        Scegli
                    </th>
                </tr>";
        if($NRighe > 0){
            while($row = $Result->fetch_assoc()){
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
                        " . $row["NomeAdmin"] ."
                    </td>
                    <td>
                        ". $row["Descrizione"] ."
                    </td>
                    <td>
                        <button class='button' type='submit' name='bottonePrenota' value=". $row["Id_Lezione"] .">
                        Seleziona!
                        </button>
                    </td>
                </tr>";
            }
        }
        else{
            echo "Nessun Risultato";
        }
        echo "
            </table>
            </form>";
    ?>
    <form action="../HomePage.php">
            <button class='button'>
                Home
            </button>
        </form>
        </div>
    </body>
</html>