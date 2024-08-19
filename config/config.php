<?php

    # Nome do Projeto
    $projectName = "Biblioteca do Poder";
    
    # Diretório auxiliar do projeto 
    $projectFolder  = "sistema-biblioteca-com-crud";  

    # Url base (do navegador) do projeto 
    $baseUrl  = "http://".$_SERVER['SERVER_NAME']."/".$projectFolder;

    # Url base (do diretório raiz) do projeto
    $basePath = $_SERVER['DOCUMENT_ROOT']."/".$projectFolder;
    
    $GLOBALS['baseUrl'] = $baseUrl;
    $GLOBALS['basePath'] = $basePath;

?>