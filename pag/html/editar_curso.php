<?php

include_once "../php/cad-usuario/curso.php";
//include_once 'CursoHelper.php';

$id_curso = filter_input(
    INPUT_GET,
    'id_curso',
    FILTER_SANITIZE_NUMBER_INT
);
$cu =  Curso::carregar($id_curso);
/** */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cad_curso.css">
    
    <title>Editar Curso</title>
</head>
<body>
<h1>Editar Curso</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/cad-usuario/cursoHelper.php">
            <fieldset>
                <legend>Dados do Curso</legend>
                <input style="display: none" name="tipo" id="tipo" type="text" value="editar_curso">
                
                <label for="id_curso">Código: </label>
                <input type="number" readonly id="id_curso" name="id_curso" value="<?php echo $cu->id_curso; ?>">
                <br>
                <label for="id_curso">Descricao: </label>
                <input size="40" value="<?php echo $cu->descricao; ?>" placeholder="Digite aqui o nome do curso" name="descricao" id="descricao" type="text">
                <!-- COmentário -->
                
            </fieldset>
        
            <fieldset>
               <input type="submit" id="btn_editar" class="editar" value="Editar">
            </fieldset>
        </form>
    </fieldset>       
  
</body>
</html>