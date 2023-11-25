<?php
   include_once "../php/comp/estagioHelper.php";
   include_once "../php/cad-usuario/professorHelper.php";
   include_once "../php/cad-usuario/alunoHelper.php";
   include_once "../php/comp/empresaHelper.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estágio</title>
    <link rel="stylesheet" href="../css/cad_estagio.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/estagioHelper.php">
            <fieldset>
               
            <input style="display: none" name="tipo" id="tipo" type="text" value="cad_estagio">
                <legend>Dados do Estagio</legend>

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
                <label for="empresas">Nome da empresa: </label>
                <select name="id_empresa" id="id_empresa">
                    <?php
                        $empresas = getEmpresas();
                        foreach($empresas as $empresa){
                            echo '<option value="'.$empresa->getIdEmpresa().'">
                            '.$empresa->nome.'</option>';
                        }
                    ?>
                </select>
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
            <legend>Estagios Cadastrados</legend>
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
                $estagios = getEstagios();
                foreach($estagios as $estagio){
                    echo '<tr>'; 
                    echo '<td>'.$estagio->id_estagio.'</td>  ';
                    echo '<td>'.$estagio->nome_professor.'</td> ';
                    echo '<td>'.$estagio->nome_aluno.'</td> ';
                    echo '<td>'.$estagio->nome_empresa.'</td> ';
                    echo '<td>'.$estagio->data_inicio.'</td> ';
                    echo '<td>'.$estagio->prev_termino.'</td> ';
                    echo '<td>'.$estagio->situacao.'</td> ';

                    echo '<td> <a class="editar"  href="editar_estagio.php?id_estagio='.$estagio->getIdEstagio().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_estagio.php?id_estagio='.$estagio->getIdEstagio().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>