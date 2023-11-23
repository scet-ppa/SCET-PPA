<?php
    session_start();
   include_once "../php/cad-usuario/professorHelper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCET - Cadastro de Professor</title>
    <link rel="stylesheet" type="text/css" href="../css/cad_prof.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>

<body>
    
    <section class="container">

        <form name="formCad" method="POST" action="../php/cad-usuario/professorHelper.php" onsubmit="return validateForm()">
            <input style="display: none" name="tipo" id="tipo" type="text" value="cad_professor">
            <div class="cont">
                <img src="../img/logo-scet.jpg" alt="logo-scet"  width="342" height="250">
                <!-- <a href="../html/home_prof.html"><button>CADASTRAR</button></a> -->
                <input class="but" type="submit" value="CADASTRAR">
            </div>
    
            <h1>Cadastro de Professor</h1>

            <div class="box">
                <div class="box-input" id="nome">
                    <input type="text" name="nome">
                <label>Nome</label>
            </div>
                <div class="box-input" id="email">
                    <input type="email" name="email">
                <label>Email</label>
        </div>
        <div class="box-input" id="matricula">
            <input type="text" name="matricula">
            <label>Matricula</label>
            </div>
            <div class="box-input" id="senha">
                <input type="password" name="senha">
                <label>Senha</label>
        </div>
      
        <div class="box-input" id="confirmar">
            <input type="password" name="senha">
            <label>Confirmar senha</label>
        </div>
        </form>
        
    </div>
    <?php
        // Set session variables
        $_SESSION["nome"] = "nome";
        $_SESSION["email"] = "email";
        ;
        ?>
    <script scr="../js/validacao.js"></script>
</body>
</html>