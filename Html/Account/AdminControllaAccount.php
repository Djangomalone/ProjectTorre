<html>
    <head>
        <title>
            Admin Controlla Prenotazioni
        </title>
    </head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(() => {
        $('.AccountUtente').hide();
        $('.AccountAdmin').hide();
        $('.ButtonAdmin').on('click', () => {
            $('.AccountUtente').hide();
            $('.AccountAdmin').show();
        });
        $('.ButtonUtente').on('click', () => {
            $('.AccountUtente').show();
            $('.AccountAdmin').hide();
        });
});
    </script> 
    <body>
        <button class="ButtonAdmin">Admin</button>
        <button class="ButtonUtente">Utenti</button>
        <?php
            include('../dbconnection.php');
            session_start();
            $Id = $_SESSION['Id_Admin'];
            $Utenti = mysqli_query($connection, "SELECT * FROM utente");
            $NUtenti = mysqli_num_rows($Utenti);
            $Admin = mysqli_query($connection, "SELECT * FROM admin");
            $NAdmin = mysqli_num_rows($Admin);
            echo "
            <table class='AccountUtente'>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Cognome
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Cellulare
                    </th>
                    <th>
                        Codice Fiscale
                    </th>
                    <th>
                        Indirizzo
                    </th>
                </tr>";
        if($NUtenti > 0){
            while($row = $Utenti->fetch_assoc()){
                echo "
                <tr>
                    <td>
                        " . $row["NomeUtente"] . "
                    </td>
                    <td>
                        " . $row["CognomeUtente"] . "
                    </td>
                    <td>
                        " . $row["Email"] ."
                    </td>
                    <td>
                        ". $row["Cellulare"] ."
                    </td>
                    <td>
                        ". $row["CodFiscale"] ."
                    </td>
                    <td>
                        ". $row["Indirizzo"] ."
                    </td>
                </tr>";
            }
        }
        else{
            echo "Nessun Risultato";
        }
        echo "</table>";
        echo "
            <table class='AccountAdmin'>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Cognome
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Cellulare
                    </th>
                </tr>";
        if($NAdmin > 0){
            while($row = $Admin->fetch_assoc()){
                echo "
                <tr>
                    <td>
                        " . $row["NomeAdmin"] . "
                    </td>
                    <td>
                        " . $row["CognomeAdmin"] . "
                    </td>
                    <td>
                        " . $row["Email"] ."
                    </td>
                    <td>
                        ". $row["Cellulare"] ."
                    </td>
                </tr>";
            }
        }
        else{
            echo "Nessun Risultato";
        }
        echo "</table>";
        ?>
        <form action="AdminAccount.php">
            <button>
                Menù Account
            </button>
        </form>
    </body>
</html>