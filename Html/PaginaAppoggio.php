<html>
    <form id="Caricamento" action="HomePage.php">
        <?php
            include('dbconnection.php');
            session_start();
            $_SESSION['varEmail'] = mysqli_real_escape_string($connection, $_POST['email']);
            $Password = mysqli_real_escape_string($connection, $_POST['password']);
            $salt = "YL!_D55v@3cnL6Gro6dAvLRgADpSC)B%@enk_Orz";
            $Pass_Cript = sha1($salt . $Password);
            $_SESSION['varPassword'] = $Pass_Cript;
        ?>
    </form>
</html>

<script type="text/javascript">
    document.getElementById('Caricamento').submit();
</script>