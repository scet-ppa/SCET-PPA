<?php

include_once "../php/cad-usuario/turma.php";
//include_once 'CursoHelper.php';

$id_turma = filter_input(
    INPUT_GET,
    'id_curso',
    FILTER_SANITIZE_NUMBER_INT
);
$tr = Turma::carregar($id_turma);
/** */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar_turma.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
    
    <title>Editar Turma</title>
</head>
<body>
<h1>Editar Turma</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/cad-usuario/turmaHelper.php">
            <fieldset>
                <legend>Dados da Turma</legend>
                <input style="display: none" name="tipo" id="tipo" type="text" value="editar_turma">
                <label for="id_turma">Código: </label>
                <input type="number" readonly id="id_turma" name="id_turma" value="<?php echo $tr->id_turma; ?>">
                <label for="id_turma">Ano Letivo: </label>
                <input size="40" value="<?php echo $tr->ano_letivo; ?>" placeholder="Digite aqui o nome da Turma" name="ano_letivo" id="ano_letivo" type="text">            
                <!-- COmentário -->
                <br>
                <label for="id_turma">Descricao: </label>
                <input size="40" value="<?php echo $tr->descricao; ?>" placeholder="Digite aqui o nome da Turma" name="descricao" id="descricao" type="text">

            </fieldset>
        
            <fieldset>
               <input type="submit" id="btn_editar" class="editar" value="Editar">
            </fieldset>
        </form>
    </fieldset>       
  
</body>
</html>