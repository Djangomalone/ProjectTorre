<html>
    <head>
        <title>
            Desha Login Page
        </title>
        <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    </head>
    <body>
         <form method="post" action="MainPage.php">
            Email:
            <input type="text" name="email" value="">
            <br>
            Password:
            <input type="password" name="password" value="">
            <br>
            <input type="radio" name="radioSelezione" value="Maestro">
            Maestro
            <input type="radio" name="radioSelezione" value="Utente" checked>
            Utente
            <br>
            <button type="submit" name="login">
                Accedi
            </button>
        </form>
    </body>
</html>