<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            header('Content-type: text/html; charset=UTF-8');
            include('dbconnection.php');
            session_start();
            if($_SESSION['varRadioSelezione']=='Utente'){
                $ResultU = mysqli_query($connection, "SELECT Id_Utente, Email, Password FROM utente WHERE BINARY Email = '" . $_SESSION['varEmail'] . "' AND BINARY Password= '". $_SESSION['varPassword'] . "'");
                echo "Vediamo se sei entrato: <br>";
                $NRigheU = mysqli_num_rows($ResultU);
                if($NRigheU > 0){
                    while($rowU = $ResultU->fetch_assoc()){
                        echo "
                            
                                <title>
                                    UserIN!
                                </title>
                            
                            <body>
                                <h1>
                                    Ciao ";
                            $nome = mysqli_query($connection, "SELECT * FROM utente WHERE BINARY Password = '" . $_SESSION['varPassword'] . "'");
                            $NRigheNome = mysqli_num_rows($nome);
                            if($NRigheNome > 0){
                                while($rowNome = $nome->fetch_assoc()){
                                    echo $rowNome['NomeUtente'];
                                    $_SESSION['Id_Utente'] = $rowNome['Id_Utente'];
                                }
                            }
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
            if($_SESSION['varRadioSelezione']=='Maestro'){
                $ResultA = mysqli_query($connection, "SELECT Email, Password FROM admin WHERE BINARY Email = '" . $_SESSION['varEmail'] . "' AND BINARY Password='" . $_SESSION['varPassword'] . "'");
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