<html>
    <head>
        <title>
            UserIN!
        </title>
    </head>
    <body>
        <h1>
            Ciao <?php
                      $nome = mysqli_query($connection, "SELECT NomeUtente FROM utente WHERE BINARY Password = '$varpassword'");
                      ?>
        </h1>
        Prenota una lezione 
    </body>
</html>