<?php
    include_once "../php/cad-usuario/alunoHelper.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCET - Cadastro de Aluno</title>
    <link rel="stylesheet" type="text/css" href="../css/cad_aluno.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>

<section class="container">
 
    <form name="formCad" method="POST" action="../php/cad-usuario/alunoHelper.php" onsubmit="return validateForm()">
        <input style="display: none" name="tipo" id="tipo" type="text" value="cad_aluno">
        
        <div class="cont">
            <img src="../img/logo-scet.jpg" alt="logo-scet"  width="342" height="250">
            <!--<a href="../html/home_aluno.php"><button>CADASTRAR</button></a> -->
            <input class="but" type="submit" value="CADASTRAR">
        </div>

        <h1>Cadastro de Aluno</h1>

        <div class="box">
            <div class="box-input" id="nome">
            <input name="nome" type="text">
            <label>Nome</label>
        </div>
        
        <div class="box-input" id="email">
            <input name="email" type="email" >
            <label>Email</label>
        </div>

        <div class="box-input" id="matricula">
            <input name="matricula"  type="text">
            <label>Matricula</label>
        </div>

        <div class="box-input" id="curso">
            <input name="curso" type="text">
            <label>Curso</label>
        </div>

        <div class="box-input" id="senha">
            <input type="password" name="senha" required="required">
            <label>Senha</label>
        </div>

        <div class="box-input" id="turma">
            <input type="text" name="turma" required="required">
            <label>Turma</label>
        </div>
    
        <div class="box-input" id="confirmar">
            <input type="password" name="senha" required="required">
            <label>Confirmação de senha</label>
        </div>

    </form>
    
</section>
    
<script scr="../js/validacao.js"></script>
</body>
</html>