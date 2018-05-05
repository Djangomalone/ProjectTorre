<html>
    <?php
        include('dbconnection.php');
        session_start();
        $session_id = $_SESSION['Id_Utente'];
        $Result = mysqli_query($connection, "SELECT * FROM utente WHERE Id_Utente = '$session_id'");
        $NRighe = mysqli_num_rows($Result);
        if($NRighe > 0){
            while($row = $Result->fetch_assoc()){
                echo $row['Id_Utente'] . "<br>". $row['NomeUtente'] . "<br>" . $row['CognomeUtente'] . "<br>";
            }
        }
    ?>
</html>