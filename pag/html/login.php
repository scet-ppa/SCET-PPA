<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCET</title>
    <link rel="stylesheet" type="text/css" href="../css/login/login.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>

<body>

    <section class="container">
        
        <div class="cont">
            <img src="../img/logo-scet.jpg" alt="logo-scet"  width="342" height="250">
            <h2>Bem-Vindo(a)</h2>
            <a href="../html/usuario.php"><button id="cad">CADASTRE-SE</button></a>
        </div>
     
        <h1>Acesse sua conta</h1>
        
        <div class="box">
            <form name="formCad" method="POST" action="../php/usar/controlador_loginHelper.php" onsubmit="return validateForm()">
                <div class="box-input">
                    <label>Usuario: </label>
                    <select class="sel" name="tipoUser" id="tipoUser">
                        <option value="prof">Professor</option>
                        <option value="aluno">Aluno</option>
                        <option value="coord">Coordenador</option>
                    </select>
                    <?php
                   /* $usuario = getUsuarios();
                    foreach($uduarios as $usuario){
                        echo '<option value="'.$usuario->getIdUsuario().'">
                        '.$usuario->descricao.'</option>';*/
                    
                    ?>
                </div>
                <div class="box-input">
                    <input type="email" required type="email" id="email" name="email">
                    <span>Email</span>
                </div>
        
                <div class="box-input">
                    <input type="password" required type="senha" id="senha" name="senha">
                    <span>Senha</span>
                </div>

                <input class="but" type="submit" value="ENTRAR">
            </form>
        </div>

       
        
        <?php
        // Set session variables
        $_SESSION["nome"] = "nome";
        $_SESSION["email"] = "email";
        ;
        ?>
    </section>
    

</body>
</html>