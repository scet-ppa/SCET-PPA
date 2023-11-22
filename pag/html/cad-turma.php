<?php
   include_once "../php/cad-usuario/turmaHelper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turmas</title>
    <link rel="stylesheet" href="../css/cad_curso.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/cad-usuario/turmaHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cad_turma">
                <legend>Dados da Turma:</legend>
                <label for="nome">Descrição: </label>
                <!-- COmentário -->
                <input size="40" required placeholder="Digite aqui o nome do curso" name="descricao" id="descricao" type="text">

                <label for="nome">Ano Letivo: </label>
                <!-- COmentário -->
                <input size="40" required placeholder="Digite aqui o ano letivo" name="ano_letivo" id="ano_letivo" type="text">
            </fieldset>

            <a class="botao" href="home_coord.php">Voltar</a>
            <input type="reset" value="Excluir">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>
    <div>
        <fieldset>
            <legend>Turma Cadastradas</legend>
            <table id="mover">
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ano Letivo</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php
                $turmas = getTurmas();
                foreach($turmas as $turma){
                    echo '<tr>'; 
                    echo '<td>'.$turma->id_turma.'</td>  ';
                    echo '<td>'.$turma->descricao.'</td> '; 
                    echo '<td>'.$turma->ano_letivo.'</td> '; 
                    echo '<td> <a class="editar"  href="editar_turma.php?id_curso='.$turma->getIdTurma().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_turma.php?id_curso='.$turma->getIdTurma().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>