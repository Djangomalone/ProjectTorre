<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Desha Home Page
        </title>
    </head>
        <?php
            header('Content-type: text/html; charset=UTF-8');
            include('dbconnection.php');
            session_start();
                $ResultU = mysqli_query($connection, "SELECT * FROM utente WHERE BINARY Email = '" . $_SESSION['varEmail'] . "' AND BINARY Password= '". $_SESSION['varPassword'] . "'");
                $NRigheU = mysqli_num_rows($ResultU);
                $ResultA = mysqli_query($connection, "SELECT * FROM admin WHERE BINARY Email = '" . $_SESSION['varEmail'] . "' AND BINARY Password='" . $_SESSION['varPassword'] . "'");
                $NRigheA = mysqli_num_rows($ResultA);
                if($NRigheU > 0){
                    while($rowU = $ResultU->fetch_assoc()){
                        $_SESSION['Id_Utente'] = $rowU['Id_Utente'];
                        echo "
                            <body>
                                <h1>
                                    Ciao ". $rowU['NomeUtente'] ."</h1>";
                            echo "
                            <a href='Prenotazioni/MakePrenotazioni.php'>Prenota una lezione</a>
                            <br>
                            <a href='Prenotazioni/LookPrenotazioni.php'>Guarda le tue prenotazioni</a>
                            <br>
                            <a href='LookLezioni.php'>Guarda le tue presenze</a>
                            <br>
                            </body>";
                    }
                }
                else if($NRigheA > 0){
                    while($rowA = $ResultA->fetch_assoc()){
                        $_SESSION['Id_Admin'] = $rowA['Id_Admin'];
                        echo "<h1>Benvenuto maestro!</h1>";
                    }
                }
                else{
                    echo "LOGIN ERRATO: EMAIL O PASSWORD NON CORRETTI";
                }    
        ?>
    <form action="LoginDesha.php">
        <button>
            Disconnettiti
        </button>
    </form>
</html>