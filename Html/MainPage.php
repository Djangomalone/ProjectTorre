<html>
    <body>
        <?php
            include('dbconnection.php');
            session_start();
            $varemail = mysqli_real_escape_string($connection, $_POST['email']);
            $varpassword = mysqli_real_escape_string($connection, $_POST['password']);
            if($_POST['radioSelezione']=='Utente'){
                $ResultU = mysqli_query($connection, "SELECT Id_Utente, Email, Password FROM utente WHERE BINARY Email = '$varemail' AND BINARY Password='$varpassword'");
                echo "Vediamo se sei entrato: <br>";
                $NRigheU = mysqli_num_rows($ResultU);
                if($NRigheU > 0){
                    while($rowU = $ResultU->fetch_assoc()){
                        echo "
                            <head>
                                <title>
                                    UserIN!
                                </title>
                            </head>
                            <body>
                                <h1>
                                    Ciao ";
                            $nome = mysqli_query($connection, "SELECT NomeUtente FROM utente WHERE BINARY Password = '$varpassword'");
                            $NRigheNome = mysqli_num_rows($nome);
                            if($NRigheNome > 0){
                                while($rowNome = $nome->fetch_assoc()){
                                    echo $rowNome['NomeUtente'];
                                }
                            }
                            $_SESSION['Id_Utente'] = $row['Id_Utente'];
                            echo "
                           </h1>
                            <a href='MakePrenotazioni.php'>Prenota una lezione</a>
                            <br>
                            </body>";
                    }
                }
                else{
                    echo "LOGIN ERRATO: EMAIL O PASSWORD NON CORRETTI";
                }
            }
            if($_POST['radioSelezione']=='Maestro'){
                $ResultA = mysqli_query($connection, "SELECT Email, Password FROM admin WHERE BINARY Email = '$varemail' AND BINARY Password='$varpassword'");
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