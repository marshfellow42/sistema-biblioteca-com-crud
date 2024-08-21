<?php

    include_once '../models/connect.php';
    include_once '../models/crud.php';

    # Recebendo os dados do formulario
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $log = select("usuarios",[], ["email"=>$email]," limit 1")[0];

    if(!$log){
        header("location: ../index.php?msg=access_error");
    }elseif(!password_verify($senha, $log['senha'])){
        header("location: ../index.php?msg=access_error");
    }else{
        
        session_start();

        unset($log[0]['senha']);

        $_SESSION[md5("user_data")] = $log;

        header("location: ../index.php");

    }

?>