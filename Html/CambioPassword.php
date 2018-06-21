<html>
    <head><link rel="stylesheet" type="text/css" href="../CSS/TheCSS.css">         <link rel="shortcut icon" href="../Images/Desha%20browser.jpg">
        <title>
            Cambio Password
        </title>
    </head>
    <body>
        <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
            
                <img src="../Images/Logo%20Desha.jpg" width="48" height="48" href="www.dayoga.it">
            </a>
        </div>
        <?php
            include('dbconnection.php');
            session_start();
            $salt = "YL!_D55v@3cnL6Gro6dAvLRgADpSC)B%@enk_Orz";
            $Pass = mysqli_real_escape_string($connection, $_POST['Password']);
            $Pass_Cript = sha1($salt . $Pass);
            $ResultA = mysqli_query($connection, "SELECT Password FROM admin WHERE Password = '$Pass_Cript'");
            $Admin = mysqli_num_rows($ResultA);
            $ResultU = mysqli_query($connection, "SELECT Password FROM utente WHERE Password = '$Pass_Cript'");
            $Utente = mysqli_num_rows($ResultU);
            if($Admin>0){
                echo "<form action='PasswordCambiata.php' method='post'>
                            Nuova Password:
                            <br>
                            <input type='password' name='NuovaPassword' required>
                            <br>
                            Conferma Nuova Password:
                            <br>
                            <input type='password' name='ConfermaNuovaPassword' required>
                            <button type='submit' name='BottoneTabella' value='A'>
                                Invio
                            </button>
                        </form>";
            }
            else if($Utente>0){
                echo "<form action='PasswordCambiata.php' method='post'>
                            Nuova Password:
                            <br>
                            <input type='password' name='NuovaPassword' required>
                            <br>
                            Conferma Nuova Password:
                            <br>
                            <input type='password' name='ConfermaNuovaPassword' required>
                            <button type='submit' name='BottoneTabella' value='U'>
                                Invio
                            </button>
                        </form>";
            }
            else{
                echo "PASSWORD ERRATA! <a href='AccessoCambioPassword.php'></a>";
            }
        ?>
    </body>
</html>