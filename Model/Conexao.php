<?php

    session_start();

    $timezone = date_default_timezone_set("America/Sao_Paulo");
    //https://www.php.net/manual/en/timezones.america.php

    $con = mysqli_connect("aws-piratefy-db.ckcmolkh760v.us-east-1.rds.amazonaws.com", "admin", "admin12345", "piratefy");

    if(mysqli_connect_errno()){
        echo "Falha ao conectar: " . mysqli_connect_errno();
    }
?>