
<?php   
    session_start();
   include_once "../php/cad-usuario/coordenadorHelper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCET - Cadastro de Coordenador</title>
    <link rel="stylesheet" type="text/css" href="../css/cad_coord.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>

    <section class="container">

        <form name="formCad" method="POST" action="../php/cad-usuario/coordenadorHelper.php" onsubmit="return validateForm()">
            <input style="display: none" name="tipo" id="tipo" type="text" value="cad_coordenador">
            <div class="cont">
                <img src="../img/logo-scet.jpg" alt="logo-scet"  width="342" height="250">
              <!--  <a href="../html/home_coord.php"><button>CADASTRAR</button></a>-->
               <input class="but" type="submit" value="CADASTRAR">
            </div>
    
            <h1>Cadastro de Coordenador</h1>

            <div class="box">
                <div class="box-input" id="nome">
                    <input type="text" name="nome">
                <label>Nome</label>
            </div>
            <div class="box-input" id="email">
                <input type="email" name="email">
                <label>Email</label>
                </div>
            <div class="box-input" id="senha">
                <input type="password" name="senha">
                <label>Senha</label>
            </div>
            <div class="box-input" id="confirmar">
                <input type="password" name="senha">
                <label>Confirmação de senha</label>
            </div>
        </form>
      </div>
    

      <?php
        // Set session variables
        $_SESSION["nome"] = "nome";
        $_SESSION["email"] = "email";
        ;
        ?>

    <script src="../js/validacao.js"></script>
</body>
</html>