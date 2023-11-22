<?php
include_once "../php/comp/tcc.php";
//include_once 'tccHelper.php';

$id_tcc = filter_input(
    INPUT_GET,
    'id_tcc',
    FILTER_SANITIZE_NUMBER_INT
);
$tc =  Tcc::carregar($id_tcc);
/** */

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar_tcc.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
    <title>Editar TCC</title>
</head>
<body>

<!--<h1>Editar TCC</h1>-->
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="form" method="POST" action="../php/com/tccHelper.php">
            <fieldset>

                <legend>Dados do TCC</legend>
                <input style="display: none" name="tipo" id="tipo" type="text" value="editar_tcc">
                
                <label for="id_tcc">Código: </label>
                <input type="number" readonly id="id_tcc" name="id_tcc" value="<?php echo $tc->id_tcc; ?>">
                <br>

                <label for="id_tcc">Aluno: </label>
                <input type="number" readonly id="id_aluno" name="id_aluno" value="<?php echo $tc->id_tcc; ?>">
                <br>

                <div class="situ">
                <label for="situacao">Situação: </label>
                <input class="input2" size="40" required placeholder="Digite aqui a situação do TCC" name="situacao" id="situacao" type="text">
                </div>

                <div>
                <label for="id_orientador">Nome do orientador: </label>
                <input class="teste" size="40" required placeholder="Digite aqui o nome da empresa" name="id_aluno" id="id_aluno" type="text">
                </div>

                <div class="data">
                <label for="data_inicio">Data de inicio: </label>
                <input class="input3" size="40" required placeholder="Digite aqui a data de inicio" name="data_inicio" id="data_inicio" type="date">
                </div>

                <div>
                <label for="id_tema">Tema: </label>
                <input class="input4" size="40" required placeholder="Digite o título do TCC" name="id_tema" id="id_tema" type="text">
                </div>

                <div class="previa">
                <label for="prev_termino">Previa de Término: </label>
                <input class="input5" size="40" required placeholder="Digite aqui a previa de término" name="prev_termino" id="prev_termino" type="date">
                </div>

                
            </fieldset>
        
            <fieldset>
               <input type="submit" id="btn_editar" class="editar" value="Editar">
            </fieldset>
        </form>
    </fieldset>       
  
</body>
</html>