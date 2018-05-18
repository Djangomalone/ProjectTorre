<html>
    <form id="Caricamento" action="MainPage.php">
        <?php
            include('dbconnection.php');
            session_start();
            $_SESSION['varEmail'] = mysqli_real_escape_string($connection, $_POST['email']);
            $_SESSION['varPassword'] = mysqli_real_escape_string($connection, $_POST['password']);
            $_SESSION['varRadioSelezione'] = mysqli_real_escape_string($connection, $_POST['radioSelezione']);
        ?>
    </form>
</html>

<script type="text/javascript">
    document.getElementById('Caricamento').submit();
</script>