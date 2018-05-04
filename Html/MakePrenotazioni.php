<html>
    <head>
        <title>
            PagePrenota
        </title>
    </head>
    <?php
        include('dbconnection.php');
        $Data = date("Y-m-d");
        echo $Data;
        echo "<br>";
        $Result = mysqli_query($connection, "SELECT Id_Lezione, Data_Lezione, Ora_Lezione, NomeAdmin FROM lezione JOIN admin ON (lezione.Id_Admin_Lezione = admin.Id_Admin) WHERE Data_Lezione > '$Data'");
        $NRighe = mysqli_num_rows($Result);
        echo "<form><table><tr><th>Data</th><th>Ora</th><th>Tenuta da</th><th>Scegli</th></tr>";
        if($NRighe > 0){
            while($row = $Result->fetch_assoc()){
                $DataGirata = date("d-m-Y", strtotime($row["Data_Lezione"]));
                echo "<tr><td>" . $DataGirata . "</td><td>" . $row["Ora_Lezione"] . "</td><td>" . $row["NomeAdmin"] ."</td> <td><button type='submit' name='bottone". $row["Id_Lezione"] ."'>Seleziona!</button></td></tr>";
            }
        }
        else{
            echo "Nessun Risultato";
        }
        echo "</table></form>";
    ?>
</html>