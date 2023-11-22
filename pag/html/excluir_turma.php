<?php
include_once "../php/cad-usuario/turma.php";
//include_once 'CursoHelper.php';

$id_turma = filter_input(
    INPUT_GET,
    'id_curso',
    FILTER_SANITIZE_NUMBER_INT
);
$tu = Turma::carregar($id_turma);
/** */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cad_curso.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">

    <title>Excluir Turma</title>
</head>

<body>
    <h1>Excluir Turma</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/cad-usuario/turmaHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="excluir_turma">
                
                <label for="id_turma">Código: </label>
                <input type="number" readonly id="id_turma" name="id_turma" value="<?php echo $tu->id_turma; ?>">
                <label for="id_turma">Ano Letivo: </label>
                <input size="40" value="<?php echo $tu->ano_letivo; ?>" placeholder="Digite aqui o nome da Turma" name="ano_letivo" id="ano_letivo" type="text">
                <br>
                <legend>Dados Turma</legend>
                <label for="id_turma">Descricao: </label>
                <input size="40" readonly value="<?php echo $tu->descricao; ?>" placeholder="Digite aqui o nome do curso" name="descricao" id="descricao" type="text">
                <!-- COmentário -->
       
               
                
            </fieldset>

            <fieldset>
                <input type="checkbox" name="excluir" id="excluir">
                <label for="excluir">Tenho ciência de que estou excluindo o registro de um curso.</label>
                <input disabled type="submit" id="btn_excluir" class="excluir" value="Excluir">
            </fieldset>
                
        </form>
    </fieldset>


    <script>
        var checkbox = document.getElementById("excluir");
        var btn_excluir = document.getElementById("btn_excluir");

        checkbox.addEventListener('click',gerenciarBotaoExcluir);

        function gerenciarBotaoExcluir(){
            if(checkbox.checked){
                btn_excluir.disabled = false;
            }else{
                btn_excluir.disabled = true;
            }

        }

     </script>           
</body>
</html>