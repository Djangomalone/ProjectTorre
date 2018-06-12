<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Desha Home Page
        </title>
    </head>
    <body>
        <?php
            header('Content-type: text/html; charset=UTF-8');
            include('dbconnection.php');
            session_start();
                $salt = "YL!_D55v@3cnL6Gro6dAvLRgADpSC)B%@enk_Orz";
                $Pass_Cript = sha1($salt . $_SESSION['varPassword']);
                $ResultU = mysqli_query($connection, "SELECT * FROM utente WHERE BINARY Email = '" . $_SESSION['varEmail'] . "' AND BINARY Password= '". $Pass_Cript . "'");
                $NRigheU = mysqli_num_rows($ResultU);
                $ResultA = mysqli_query($connection, "SELECT * FROM admin WHERE BINARY Email = '" . $_SESSION['varEmail'] . "' AND BINARY Password='" . $Pass_Cript . "'");
                $NRigheA = mysqli_num_rows($ResultA);
                if($NRigheU > 0){
                    while($rowU = $ResultU->fetch_assoc()){
                        $_SESSION['Id_Utente'] = $rowU['Id_Utente'];
                        echo "
                            <h1>
                                Ciao ". $rowU['NomeUtente'] ."
                            </h1>
                            <a href='Prenotazioni/MakePrenotazioni.php'>Prenota una lezione</a>
                            <br>
                            <a href='Prenotazioni/LookPrenotazioni.php'>Guarda le tue prenotazioni</a>
                            <br>
                            <a href='LookLezioni.php'>Guarda le tue presenze</a>
                            <br>
                            <a href='AccessoCambioPassword.php'>Cambia Password</a><br>";
                    }
                }
                else if($NRigheA > 0){
                    while($rowA = $ResultA->fetch_assoc()){
                        $_SESSION['Id_Admin'] = $rowA['Id_Admin'];
                        echo "
                                <h1>
                                    Benvenuto maestro!
                                </h1>
                                <a href='AdminLezioni.php'>Lezioni</a><br>
                                <a href='AdminControllaPrenotazioni.php'>Prenotazioni</a><br>
                                <a href='AdminAccount.php'>Account</a><br>
                                <a href='AdminAbbonamenti.php'>Abbonamenti</a><br>
                                ";
                    }
                }
                else{
                    echo "LOGIN ERRATO: EMAIL O PASSWORD NON CORRETTI";
                }    
        ?>
    <form action="PaginaDisconnessione.php">
        <button>
            Disconnettiti
        </button>
    </form>
    </body>
</html>