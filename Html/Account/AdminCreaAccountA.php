<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         
        <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Crea Account Admin
        </title>
    </head>
    <body>
    <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
        </div>
    <div class="ParteCentrale lezioni">
    <form method="post" action="AdminAdminCreato.php">
        Inserisci nome: <br>
        <input type="text" name="Nome" required><br>
        Inserisci cognome: <br>
        <input type="text" name="Cognome" required><br>
        Inserisci e-mail:<br>
        <input type="text" name="Email"><br>
        Inserisci cellulare:<br>
        <input type="text" name="Cellulare"><br>
        Inserisci Password:<br>
        <input type="password" name="Password"><br>
        Conferma Password:<br>
        <input type="password" name="ConfermaPassword"><br><br>
        <input class="button" type="submit" value="Crea Admin">
    </form>
    <form action="AdminAccount.php">
        <button class="button">
            Torna al menù account
        </button>
    </form>
    </div>
    </body>
</html>