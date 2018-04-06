<html>
    <body>
        <?php
            include('dbconnection.php');
            $varemail = mysqli_real_escape_string($connection, $_POST['email']);
            $varpassword = mysqli_real_escape_string($connection, $_POST['password']);
            if($_POST['radioSelezione']=='Utente'){
                $ResultU = mysqli_query($connection, "SELECT Email, Password FROM utente WHERE BINARY Email = '$varemail' AND BINARY Password='$varpassword'");
                echo "Vediamo se sei entrato: <br>";
                $NRigheU = mysqli_num_rows($ResultU);
                if($NRigheU > 0){
                    while($rowU = $ResultU->fetch_assoc()){
                        echo "Benvenuto utente!<br>";
                    }
                }
                else{
                    echo "LOGIN ERRATO: EMAIL O PASSWORD NON CORRETTI";
                }
            }
            if($_POST['radioSelezione']=='Maestro'){
                $ResultA = mysqli_query($connection, "SELECT Email, Password FROM admin WHERE BINARY Email = '$varemail' AND BINARY Password='$varpassword'");
                echo "Vediamo se sei entrato: <br>";
                $NRigheA = mysqli_num_rows($ResultA);
                if($NRigheA > 0){
                    while($rowA = $ResultA->fetch_assoc()){
                        echo "Benvenuto maestro!<br>";
                    }
                }
                else{
                    echo "LOGIN ERRATO: EMAIL O PASSWORD NON CORRETTI";
                }
            }    
        ?>
    </body>
</html>