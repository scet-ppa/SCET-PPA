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
    <title>Cadatro de Estágio</title>
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
                <input class="input2" size="40" required placeholder="Digite aqui a situação do estagio" name="situacao" id="situacao" type="text">
                </div>

                <div>
                <label for="alunos">Nome do Aluno: </label>
                <select name="aluno" id="aluno">
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
                <input class="input3" size="40" required placeholder="Digite aqui a data de inicio" name="data_inicio" id="data_inicio" type="date">
                </div>

                <div>
                <label for="empresas">Nome da empresa: </label>
                <select name="empresa" id="empresas">
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
                <input class="input5" size="40" required placeholder="Digite aqui a previa de termino" name="prev_termino" id="prev_termino" type="date">
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
                    <th>Código</th>
                    <th>Professor</th>
                    <th>Aluno</th>
                    <th>Empresa</th>
                    <th>Data de Ínicio</th>
                    <th>Previa de término</th>
                    <th>Situação</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php
                $estagios = getEstagios();
                foreach($estagios as $estagio){
                    echo '<tr>'; 
                    echo '<td>'.$estagio->id_estagio.'</td>  ';
                    echo '<td>'.$estagio->orientador.'</td> ';
                    echo '<td>'.$estagio->id_aluno.'</td> ';
                    echo '<td>'.$estagio->id_empresa.'</td> ';
                    echo '<td>'.$estagio->data_inicio.'</td> ';
                    echo '<td>'.$estagio->prev_termino.'</td> ';
                    echo '<td>'.$estagio->situacao.'</td> ';

                    echo '<td> <a class="editar"  href="editar_estagio.php?id_estagio='.$estagio->getIdEstagio().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_estagio.php?id_estagio='.$estagio->getIdEstagio().'">Concluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>