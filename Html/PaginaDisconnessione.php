<html>
    <form id="Disconnessione" action="index.php">
        <?php
            include('dbconnection.php');
            session_start();
            $_SESSION['Id_Utente'] = '';
        ?>
    </form>
</html>

<script type="text/javascript">
    document.getElementById('Disconnessione').submit();
</script>