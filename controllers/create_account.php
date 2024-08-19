<?php

    include_once '../models/connect.php';
    include_once '../models/crud.php'; 

    $nome = $_POST['nome'];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $contato_input = $_POST['telefone'];

    $contato = preg_replace('/\D/', '', $contato_input);

    error_log($contato);
    
    $dtNascimento = $_POST['dtNascimento'];

    $cgc_input = $_POST['cpf'];

    $cgc = preg_replace('/\D/', '', $cgc_input);

    error_log($cgc);

    $options = [
        'memory_cost' => 9*1024, // memory_cost = m (in KiB)
        'time_cost' => 4, // time_cost = t
        'threads' => 1 // threads = p
    ];

    $hashedSenha = password_hash($senha, PASSWORD_ARGON2ID, $options);

    $insertResult = insert("usuarios", [
        "nome" => $nome,
        "email" => $email,
        "senha" => $hashedSenha,
        "contato" => $contato,
        "dtNasc" => $dtNascimento,
        "tipoUser" => 2,
        "cgc" => $cgc
    ]);

    if (!$insertResult) {
        header("location: ../index.php?msg=insert_error");
        exit();
    }

    $query = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        
        $log = mysqli_fetch_assoc($result);

        if (password_verify($senha, $log['senha'])) {

            session_start();

            $_SESSION[md5("user_data")] = $log;

            header("location: ../index.php");

        } else {
            error_log("User input password: " . $senha);
            error_log("Retrieved hash: " . $log['senha']);

            header("location: ../index.php?msg=password_verify_error");
        }
    } else {
        header("location: ../index.php?msg=select_sql_query_error");
    }

?>