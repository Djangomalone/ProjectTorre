<html>
    <head><link rel="stylesheet" type="text/css" href="../../CSS/TheCSS.css">         <link rel="shortcut icon" href="../../Images/Desha%20browser.jpg">
        <title>
            Crea Account Utente
        </title>
    </head>
    <div class="BarraAlta">
            <h1>
               Desha Ashtanga Yoga
            </h1>
            
                <img src="../Images/Logo%20Desha.jpg" width="48" height="48" href="www.dayoga.it">
            </a>
        </div>
    <form method="post" action="AdminUtenteCreato.php">
        Inserisci nome: <br>
        <input type="text" name="Nome" required><br>
        Inserisci cognome: <br>
        <input type="text" name="Cognome" required><br>
        Inserisci e-mail:<br>
        <input type="text" name="Email"><br>
        Inserisci cellulare:<br>
        <input type="text" name="Cellulare"><br>
        Inserisci codice fiscale:<br>
        <input type="text" name="CodiceFiscale"><br>
        Inserisci indirizzo:<br>
        <input type="text" name="Indirizzo"><br>
        Inserisci Password:<br>
        <input type="password" name="Password"><br>
        Conferma Password:<br>
        <input type="password" name="ConfermaPassword"><br>
        <input type="submit" value="Crea Utente">
    </form>
    <form action="AdminAccount.php">
        <button>
            Torna al menù account
        </button>
    </form>
</html>