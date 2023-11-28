<?php
   include_once "../php/comp/tcc.php";
   include_once "../php/cad-usuario/professorHelper.php";
   include_once "../php/cad-usuario/alunoHelper.php";
   //include_once "../php/comp/temaHelper.php";

   $id_tcc = filter_input(
    INPUT_GET,
    'id_tcc',
    FILTER_SANITIZE_NUMBER_INT
);
$tc = TCC::carregar($id_tcc);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de TCC</title>
    <link rel="stylesheet" href="../css/cad_estagio.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/tccHelper.php">
            <fieldset>
               
            <input style="display: none" name="tipo" id="tipo" type="text" value="editar_tcc">
                <legend>Dados do TCC</legend>
                <label for="id_tcc">Código: </label>
                <input type="number" readonly id="id_tcc" name="id_tcc" value="<?php echo $tc->id_tcc; ?>">

                <div>
                <label for="professores">Nome do Professor: </label>
                <select readonly name="id_professor" id="id_professor">
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
                        <option value="Iniciado">Iniciado</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizado">Finalizado</option>
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
                <input class="input3" size="40" value="<?php echo $tc->data_inicio; ?>" placeholder="Digite aqui a data de inicio" name="data_inicio" id="data_inicio" type="date">
                </div>

                <div>
                <label for="tema">Título do TCC: </label>
                <input class="input3" size="40"  value="<?php echo $tc->tema; ?>" placeholder="Digite o título do TCC" id="tema" name="tema" type="text">
                </div>

                <div class="previa">
                <label for="prev_termino">Previa de Termino: </label>
                <input class="input5" size="40" value="<?php echo $tc->prev_termino; ?>" placeholder="Digite aqui a previa de termino" name="prev_termino" id="prev_termino" type="date">
                </div>

                </fieldset>
        
        <fieldset>
           <input type="submit" id="btn_editar" class="editar" value="Editar">
        </fieldset>
    </form>
</fieldset>       

</body>
</html>