<?php

    session_start();

    if(!isset($_SESSION[md5("user_data")])){
        header("location: index.php?msg=access_denied");
    }

    $user = $_SESSION[md5("user_data")];

    if($user['tipoUser'] != 2){
        header("location: index.php?msg=not_the_correct_type_user");
    }

    include_once 'config/config.php';
    include_once 'models/validate.php';
    include_once 'models/alerts.php';

    $userData = $_SESSION[md5('user_data')];

    function pageContent(){
        validate();
    }

    include_once 'layout/layout.php';

?>