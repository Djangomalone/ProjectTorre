<html>
    <head>
        <title>
            Admin creato
        </title>
    </head>
    <body>
        <?php
            include('../dbconnection.php');
            session_start();
            $Nome = mysqli_real_escape_string($connection, $_POST['Nome']);
            $Cognome = mysqli_real_escape_string($connection, $_POST['Cognome']);
            $Email = mysqli_real_escape_string($connection, $_POST['Email']);
            $Cellulare = mysqli_real_escape_string($connection, $_POST['Cellulare']);
            $Password = mysqli_real_escape_string($connection, $_POST['Password']);
            $ConfermaPassword = mysqli_real_escape_string($connection, $_POST['ConfermaPassword']);
            $Controllo = mysqli_query($connection, "SELECT Email FROM admin WHERE Email = '$Email'");
            $NAdmin = mysqli_num_rows($Controllo);
            if($Password==$ConfermaPassword){
                if($NAdmin>0){
                    echo "Utente esistente. <a href='AdminCreaAccountU.php'>Immettere un altro utente</a>";
                }
                else{
                    $salt = "YL!_D55v@3cnL6Gro6dAvLRgADpSC)B%@enk_Orz";
                    $Pass_Cript = sha1($salt . $Password);
                    $Inserimento = mysqli_query($connection, "INSERT INTO `admin` (`Id_Admin`, `NomeAdmin`, `CognomeAdmin`, `Email`, `Cellulare`, `Password`) VALUES (NULL, '$Nome', '$Cognome', '$Email', '$Cellulare', '$Pass_Cript');");
                    if($Inserimento > 0){
                        echo "Inserimento andato a buon fine. Torna al <a href='AdminAccount.php'>menù account</a>";
                    }
                    else{
                        echo "QUALCOSA È ANDATO STORTO! <a href='AdminCreaAccountA.php'>Riprovare</a>";
                    }
                }
            }
            else{
                echo "Password e conferma password sbagliati. <a href='AdminCreaAccountA.php'>Prego riprovare</a>";
            }
        ?>
    </body>
</html>