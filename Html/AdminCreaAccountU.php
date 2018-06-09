<html>
    <head>
        <title>
            Crea Account Utente
        </title>
    </head>
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