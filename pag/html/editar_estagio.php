<?php
   include_once "../php/comp/estagio.php";

   
   $id_estagio = filter_input(
    INPUT_GET,
    'id_estagio',
    FILTER_SANITIZE_NUMBER_INT
);
$es =  Estagio::carregar($id_estagio);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cad_Estagio</title>
    <link rel="stylesheet" href="../css/cad_estagio.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/estagioHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cad_estagio">
                <legend>Dados do Estagio</legend>

                <div>
                <label for="orientador">Nome do Professor: </label>
                <input class="input1" size="40" required placeholder="Digite aqui o nome do professor" name="orientador" id="orientador" type="text" value="<?php echo $es->orientador; ?>">
                </div>

                <div class="situ">
                <label for="situacao">Situação: </label>
                <input class="input2" size="40" required placeholder="Digite aqui a situação do estagio" name="situacao" id="situacao" type="text" value="<?php echo $es->situacao; ?>">
                </div>

                <div>
                <label for="id_aluno">Nome do Aluno: </label>
                <input class="teste" size="40" required placeholder="Digite aqui o nome da empresa" name="id_aluno" id="id_aluno" type="text" value="<?php echo $es->id_aluno; ?>">
                </div>

                <div class="data">
                <label for="data_inicio">Data de inicio: </label>
                <input class="input3" size="40" required placeholder="Digite aqui a data de inicio" name="data_inicio" id="data_inicio" type="date" value="<?php echo $es->data_inicio; ?>">
                </div>

                <div>
                <label for="id_empresa">Nome da Empresa: </label>
                <input class="input4" size="40" required placeholder="Digite aqui o nome do aluno" name="id_empresa" id="id_empresa" type="text" value="<?php echo $es->id_empresa; ?>">
                </div>

                <div class="previa">
                <label for="prev_termino">Previa de Termino: </label>
                <input class="input5" size="40" required placeholder="Digite aqui a previa de termino" name="prev_termino" id="prev_termino" type="date" value="<?php echo $es->prev_termino; ?>">
                </div>

            </fieldset>

            <fieldset>
            <input type="submit" id="btn_editar" class="editar" value="Editar">
            </fieldset>

        </form>
</fieldset>
    
</body>
</html>