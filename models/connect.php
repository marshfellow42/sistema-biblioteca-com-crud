<?php

    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $dbname = "sistema-crud";
    
    # Criar a conexão com o banco de dados
    $GLOBALS['conn'] = mysqli_connect($host, $user, $pass, $dbname) or 
    die("Falha ao conectar ao banco de dados! ".mysqli_connect_error());

    function closeConn(){
        mysqli_close($GLOBALS['conn']);
    }

?>