<html>
    <head>
        <title>
            Crea Account Admin
        </title>
    </head>
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
        <input type="password" name="ConfermaPassword"><br>
        <input type="submit" value="Crea Admin">
    </form>
    <form action="AdminAccount.php">
        <button>
            Torna al menù account
        </button>
    </form>
</html>