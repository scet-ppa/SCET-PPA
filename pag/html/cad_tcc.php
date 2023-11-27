<?php
   include_once "../php/comp/tccHelper.php";
   include_once "../php/cad-usuario/professorHelper.php";
   include_once "../php/cad-usuario/alunoHelper.php";
   include_once "../php/comp/temaHelper.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de TCC</title>
    <link rel="stylesheet" href="../css/cad_tcc.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/tccHelper.php">
            <fieldset>
               
            <input style="display: none" name="tipo" id="tipo" type="text" value="cad_tcc">
                <legend>Dados do TCC</legend>

                <div>
                <label for="professores">Nome do Professor: </label>
                <select name="orientador" id="orientador">
                    <?php
                        $professores = getProfessores();
                        foreach($professores as $professor){
                            echo '<option value="'.$professor->getIdProfessor().'">
                            '.$professor->nome.'</option>';
                        }
                    ?>
                </select>
                </div>

                <div class="situ">
                    <label for="situacao">Situação: </label>
                    <select name="situacao" id="situacao"> 
                        <option value="iniciado">Iniciado</option>
                        <option value="em andamento">Em andamento</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>

                <div>
                <label for="alunos">Nome do Aluno: </label>
                <select name="id_aluno" id="id_aluno">
                    <?php
                        $alunos = getAlunos();
                        foreach($alunos as $aluno){
                            echo '<option value="'.$aluno->getIdAluno().'">
                            '.$aluno->nome.'</option>';
                        }
                    ?>
                </select>
                </div>

                <div class="data">
                <label for="data_inicio">Data de inicio: </label>
                <input class="input3" size="40" required name="data_inicio" id="data_inicio" type="date">
                </div>

                <div>
                <label for="temas">Título do TCC: </label>
                <input class="input3" size="40" required placeholder="Digite o título do TCC" id="data_inicio" type="text">
                </div>

                <div class="previa">
                <label for="prev_termino">Previa de Termino: </label>
                <input class="input5" size="40" required name="prev_termino" id="prev_termino" type="date">
                </div>

            </fieldset>

            <a class="botao" href="home_coord.php">Voltar</a>
            <input type="reset" value="Excluir">
            <input type="submit" value="Enviar">

        </form>
</fieldset>
    <div>
        <fieldset>
            <legend>tcc Cadastrados</legend>
            <table id="mover">
                <tr>
                    <th>ID</th>
                    <th>Docente</th>
                    <th>Aluno</th>
                    <th>Empresa</th>
                    <th>Ínicio</th>
                    <th>Término</th>
                    <th>Status</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php
                $tccs = getTCCS();
                foreach($tccs as $tcc){
                    echo '<tr>'; 
                    echo '<td>'.$tcc->id_tcc.'</td>  ';
                    echo '<td>'.$tcc->nome_professor.'</td> ';
                    echo '<td>'.$tcc->nome_aluno.'</td> ';
                    echo '<td>'.$tcc->nome_tema.'</td> ';
                    echo '<td>'.$tcc->data_inicio.'</td> ';
                    echo '<td>'.$tcc->prev_termino.'</td> ';
                    echo '<td>'.$tcc->situacao.'</td> ';

                    echo '<td> <a class="editar"  href="editar_tcc.php?id_tcc='.$tcc->getIdTCC().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_tcc.php?id_tcc='.$tcc->getIdTCC().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>