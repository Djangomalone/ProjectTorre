<?php
    $connection = mysqli_connect("localhost", "root", "", "desha database");
    if(mysqli_connect_errno()){
        echo "Connessione del cazzo" . mysqli_connect_error();
    }
?>