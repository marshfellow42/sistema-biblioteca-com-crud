<?php

    function validate(){

        if(!isset($_GET['page'])){
            return false;
        }
        
        include_once $GLOBALS['basePath'].'/models/connect.php';
        include_once $GLOBALS['basePath'].'/models/crud.php';
       
        
        switch($_GET['page']){
            
            case 'dashboard':
                include_once $GLOBALS['basePath']."../modules/dashboard/dash.php";
            break;

            case "insertBook":
                include_once $GLOBALS['basePath']."../modules/books/insert.php";
            break;
                
            case "listBooks":
                $GLOBALS['datatables'] = true;
                $books = select("livros", [], []," where isDeleted is NULL order by nome ASC");
                include_once $GLOBALS['basePath']."../modules/books/list.php";
            break;    
                    
            case "updateBook":
                $book = select("livros", [], ["id"=>$_GET['id']]," ")[0];
                include_once $GLOBALS['basePath']."../modules/books/update.php";
            break;

        }

    }

?>