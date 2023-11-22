<?php

include_once "../php/comp/empresaHelper.php";
//include_once 'CursoHelper.php';

$id_empresa = filter_input(
    INPUT_GET,
    'id_empresa',
    FILTER_SANITIZE_NUMBER_INT
);
$emp = Empresa::carregar($id_empresa);
/** */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar_empresa.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
    
    <title>Editar Empresa</title>
</head>
<body>
<h1>Editar Empresa</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/comp/empresaHelper.php">
            <fieldset>
                <legend>Dados da Empresa</legend>
                <input style="display: none" name="tipo" id="tipo" type="text" value="editar_empresa">
                <label for="id_empresa">Código: </label>
                <input type="number" readonly id="id_empresa" name="id_empresa" value="<?php echo $emp->id_empresa; ?>">
                <label for="id_empresa">Nome da Empresa: </label>
                <input size="40" value="<?php echo $emp->nome; ?>" placeholder="Digite aqui o nome da Empresa" name="nome" id="nome" type="text">            
                <!-- COmentário -->
                <br>
               
            </fieldset>
        
            <fieldset>
               <input type="submit" id="btn_editar" class="editar" value="Editar">
            </fieldset>
        </form>
    </fieldset>       
  
</body>
</html>