<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/TheCSS.css">
        <link rel="shortcut icon" href="../Images/Desha%20browser.jpg">
        <meta charset="UTF-8">
        <title>
            Desha Home Page
        </title>
    </head>
    <body>
        <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
            <a href="https://www.dayoga.it">
                <img src="../Images/Logo%20Desha.jpg" width="48" height="48" href="www.dayoga.it">
            </a>
        </div>
        <div class='ParteCentrale'>
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
                            
                            <a href='Prenotazioni/LookPrenotazioni.php'>Guarda le tue prenotazioni</a>
                            
                            <a href='Prenotazioni/LookLezioni.php'>Guarda le tue presenze</a>
                            
                            <a href='AccessoCambioPassword.php'>Cambia Password</a>
                            ";
                    }
                }
                else if($NRigheA > 0){
                    while($rowA = $ResultA->fetch_assoc()){
                        $_SESSION['Id_Admin'] = $rowA['Id_Admin'];
                        echo "
                                <h1>
                                    Benvenuto maestro!
                                </h1>
                                <a href='Lezioni/AdminLezioni.php'>Lezioni</a>
                                <a href='Prenotazioni/AdminControllaPrenotazioni.php'>Prenotazioni</a>
                                <a href='Account/AdminAccount.php'>Account</a>
                                <a href='Presenze/AdminPresenze.php'>Presenze</a>
                                <a href='Abbonamenti/AdminAbbonamenti.php'>Abbonamenti</a>
                                ";
                    }
                }
                else{
                    echo "LOGIN ERRATO: EMAIL O PASSWORD NON CORRETTI";
                }    
        ?>
            <br>
            <br>
            <form action='PaginaDisconnessione.php'>
                <button class="button">
                    Disconnetti
                </button>
            </form>
        </div>
    </body>
</html>