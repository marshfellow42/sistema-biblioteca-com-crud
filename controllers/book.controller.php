<?php

    if(isset($_REQUEST['action'])){
        
        include_once '../config/config.php';
        include_once $basePath."/models/connect.php";
        include_once $basePath."/models/crud.php";

        switch($_REQUEST['action']){

            case "insert":

                unset($_POST['action']);
                $fileName = md5(date("YmdHis")).".".end(explode(".",$_FILES['capa']['name']));
                move_uploaded_file($_FILES['capa']['tmp_name'], $basePath."/assets/img/books/$fileName");
                $_POST['capa'] = $fileName;
                if(insert("livros", $_POST,'')){
                    $msg = "book_inserted";
                }else{
                    $msg = "book_inserted_error";
                }

                //var_dump($_FILES);
            break;

            case "update":
                unset($_POST['action']);
                if(update("livros",$_POST, ['id'=>$_POST["id"]], "")){
                    $msg = "book_updated";
                }else{
                    $msg = "book_updated_error";
                }

            break;
            
            case "delete":
                unset($_POST['action']);
                if(update("livros",["isDeleted"=>"*"], ['id'=>$_POST["id"]], "")){
                    $msg = "book_deleted";
                }else{
                    $msg = "book_deleted_error";
                }
            break;

            case "block":
                unset($_GET['action']);
                if(update("livros",$_GET, ['id'=>$_GET["id"]], "")){
                    $msg = ($_GET['ativo'] == 1) ? "book_activated" : "book_blocked";
                }else{
                    $msg = "book_updated_error";
                }
            break;

        }

        header("location: $baseUrl/admin.php?page=listBooks&msg=$msg");

    }else{
        header("location: ../index.php?msg=access_denied");
    }





?>