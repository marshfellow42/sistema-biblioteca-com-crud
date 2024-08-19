<?php

if (isset($_GET['msg'])):
    switch ($_GET['msg']) {

        case 'test':
            $icon = "success";
            $title = "Teste de Mensagem";
            $text = "Olá mundo!!!!";
            break;

        case 'welcome':
            $icon = "success";
            $title = "Bem vindo(a)!";
            $text = "Olá, " . $user['nome'] . "";
            break;

        case 'book_inserted':
            $icon = "success";
            $title = "Livro Inserido!";
            $text = "O livro foi inserido com sucesso!";
            break;

        case 'book_updated':
            $icon = "success";
            $title = "Livro Atualizado!";
            $text = "O livro foi atualizado com sucesso!";
            break;

        case 'book_activated':
            $icon = "success";
            $title = "Livro Ativado!";
            $text = "O livro foi ativado com sucesso!";
            break;

        case 'book_blocked':
            $icon = "info";
            $title = "Livro Bloqueado!";
            $text = "O livro foi bloqueado com sucesso!";
            break;

        case 'book_inserted_error':
            $icon = "error";
            $title = "Livro não foi inserido";
            $text = "O livro não foi inserido no sistema.";
            break;

        case "access_error":
            $icon = "error";
            $title = "Erro ao acessar!";
            $text = "Usuário ou senha incorretos!";
            break;

        case "no_users":
            $icon = "error";
            $title = "Erro ao acessar!";
            $text = "Não existe nenhum usuário.";
            break;

        case "invalid_password":
            $icon = "error";
            $title = "As senhas não conferem!";
            $text = "Preencha as senhas iguais.";
            break;

        case "ending_session":
            $icon = "success";
            $title = "Sessão encerrada";
            $text = "Volte sempre!!";
            break;

        case "access_denied":
            $icon = "error";
            $title = "Acesso não permitido!";
            $text = "Verifique os dados de acesso.";
            break;

        case "same_email":
            $icon = "error";
            $title = "Erro ao criar!";
            $text = "Esse email já existe no sistema.";
            break;

        case "insert_error":
            $icon = "error";
            $title = "Erro de inserção";
            $text = "O usuário não foi colocado no banco de dados. Cheque a conexão do seu banco de dados com o site.";
            break;

        case "select_sql_query_error":
            $icon = "error";
            $title = "Erro de query SQL";
            $text = "A query SQL de seleção do email não deu certo.";
            break;

        case "password_verify_error":
            $icon = "error";
            $title = "Erro de verificação";
            $text = "A verificação da senha não deu certo.";
            break;

        case "not_the_correct_type_user":
            $icon = "error";
            $title = "Erro de verificação";
            $text = "Você não tem o acesso necessário a essa página.";
            break;
    }
?>
    <script>
        Swal.fire({
            icon: "<?=$icon;?>",
            title: "<?=$title;?>",
            text: "<?=$text;?>",
            showConfirmButton: false,
            footer: '<a href="index.php" class="btn btn-primary"> OK! </a>'
        });
    </script>
<?php endif; ?>
