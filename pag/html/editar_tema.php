<?php
include_once "../php/comp/temaHelper.php";

$id_tema = filter_input(
    INPUT_GET,
    'id_tema',
    FILTER_SANITIZE_NUMBER_INT
);
$tem = Tema::carregar($id_tema);
/** */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cad_tcc.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
    
    <title>Editar Tema</title>
</head>
<body>
<h1>Editar Tema</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/comp/temaHelper.php">
            <fieldset>
                <legend>Dados do Tema</legend>
                <input style="display: none" name="tipo" id="tipo" type="text" value="editar_tema">
                <label for="id_tema">Código: </label>
                <input type="number" readonly id="id_tema" name="id_tema" value="<?php echo $tem->id_tema; ?>">
                <label for="id_empresa">Título do Tema: </label>
                <input size="40" value="<?php echo $tem->nome; ?>" placeholder="Digite aqui o nome do tema" name="nome" id="nome" type="text">            
  
                <br>
               
            </fieldset>
        
            <fieldset>
               <input type="submit" id="btn_editar" class="editar" value="Editar">
            </fieldset>
        </form>
    </fieldset>       
  
</body>
</html>