<?php

    session_start();

    if (isset($_SESSION[md5("user_data")])) {
        header("location: admin.php ");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <img src="images/white.png" alt="">
                <div class="text">
                    <!-- <p>Join the community of developers <i>- ludiflex</i></p> -->
                </div>
                
            </div>

            <div class="col-md-6 right">
                
                <div class="input-box">
                   <header>Criar Conta</header>

                   <form action="controllers/create_account.php" method="POST">

                        <div class="input-field">
                            <input type="text" class="input" name="nome" required>
                            <label for="text">Nome</label>
                        </div> 
                        
                        <div class="input-field">
                            <input type="email" class="input" name="email" required autocomplete="off">
                            <label for="email">Email</label> 
                        </div>

                        <div class="input-field">
                            <input type="password" class="input" name="senha" required>
                            <label for="text">Senha</label>
                        </div>

                        <div class="input-field">
                            <input type="text" class="input" name="telefone" id="telefone" onkeypress="return /[0-9]/i.test(event.key)" required>
                            <label for="text">Telefone</label>
                        </div> 
                        
                        <div class="input-field">
                            <input type="text" class="input" name="cpf" id="cpf" onkeypress="return /[0-9]/i.test(event.key)" required>
                            <label for="text">CPF</label>
                        </div>
                        
                        <div class="input-field">
                            <input type="date" class="input" name="dtNascimento" id="dtNascimento" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" required>
                            <label style="top: -10px; font-size: 13px;">Data de Nascimento</label>
                        </div>
                        
                        <div class="input-field">    
                            <input type="submit" class="submit" value="Criar">
                        </div>

                        <div class="signin">
                            <span>Já tem uma conta? <a href="index.php">Faça Login</a></span>
                        </div>
                   </form>
                   
                </div>  
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dtNascimento').keydown(function(e) {
            e.preventDefault();
        });

        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
    });
</script>
</body>
</html>

<?php include_once 'models/alerts.php' ?>