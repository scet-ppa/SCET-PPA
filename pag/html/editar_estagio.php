<?php
   include_once "../php/comp/estagio.php";
   include_once "../php/cad-usuario/professorHelper.php";
   include_once "../php/cad-usuario/alunoHelper.php";
   include_once "../php/comp/empresaHelper.php";

   $id_estagio = filter_input(
    INPUT_GET,
    'id_estagio',
    FILTER_SANITIZE_NUMBER_INT
);
$es = Estagio::carregar($id_estagio);
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
               
            <input style="display: none" name="tipo" id="tipo" type="text" value="excluir_estagio">
                <legend>Dados do Estagio</legend>

                <div>
                <label for="professores">Nome do Professor: </label>
                <select readonly name="orientador" id="orientador">
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
                <select readonly name="situacao" id="situacao"> 
                <option value="iniciado">Iniciado</option>
                <option value="em andamento">Em andamento</option>
                <option value="finalizado">Finalizado</option>
                </select>
                </div>

                <div>
                <label for="alunos">Nome do Aluno: </label>
                <select readonly name="id_aluno" id="id_aluno">
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
                <input class="input3" value="<?php echo $es->data_inicio; ?> size="40" required placeholder="Digite aqui a data de inicio" name="data_inicio" id="data_inicio" type="date">
                </div>

                <div>
                <label for="empresas">Nome da empresa: </label>
                <select readonly name="id_empresa" id="id_empresa">
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
                <input class="input5" value="<?php echo $es->prev_termino; ?> size="40" required placeholder="Digite aqui a previa de termino" name="prev_termino" id="prev_termino" type="date">
                </div>

                </fieldset>
        
        <fieldset>
           <input type="submit" id="btn_editar" class="editar" value="Editar">
        </fieldset>
    </form>
</fieldset>       

</body>
</html>