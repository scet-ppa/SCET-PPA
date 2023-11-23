<?php
    session_start();
    include_once "../php/cad-usuario/alunoHelper.php";
    include_once "../php/cad-usuario/cursoHelper.php";
    include_once "../php/cad-usuario/turmaHelper.php";
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
            <span>Nome</span>
        </div>
        
        <div class="box-input" id="email">
            <input name="email" type="email" >
            <span>Email</span>
        </div>

        <div class="box-input" id="matricula">
            <input name="matricula"  type="text">
            <span>Matricula</span>
        </div>

        <label>Curso:</label>
        <div class="box-input" id="curso">
        
            <select class="sel" name="curso" type="text">
            <?php
            $cursos = getCursos();
                foreach($cursos as $curso){
                    echo '<option value="'.$curso->getIdCurso().'">
                    '.$curso->descricao.'</option>';
                }
            ?>
            </select>
            
        </div>

        <div class="box-input" id ="turma">
        
            <select class="sel-tu" name="turma" type="text">
            <?php
            $turmas = getTurmas();
                foreach($turmas as $turma){
                    echo '<option value="'.$turma->getIdTurma().'">
                    '.$turma->descricao.' - '.$turma->ano_letivo.'</option>';
                }
            ?>
            </select>
            
        </div>

        <div class="box-input" id="senha">
            <input type="password" name="senha" required="required">
            <span>Senha</span>
        </div>

        
    
        <div class="box-input" id="confirmar">
            <input type="password" name="senha" required="required">
            <span>Confirmação de senha</span>
        </div>
        </div>
        
    </form>
    
</section>
<?php
        // Set session variables
        $_SESSION["nome"] = "nome";
        $_SESSION["email"] = "email";
        ;
        ?>
        
<script scr="../js/validacao.js"></script>
</body>
</html>