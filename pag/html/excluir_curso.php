<?php
include_once "../php/cad-usuario/curso.php";
//include_once 'CursoHelper.php';

$id_curso = filter_input(
    INPUT_GET,
    'id_curso',
    FILTER_SANITIZE_NUMBER_INT
);
$cu = Curso::carregar($id_curso);
/** */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cad_curso.css">

    <title>Excluir Curso</title>
</head>

<body>
    <h1>Excluir Curso</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/cad-usuario/cursoHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="excluir_curso">
                
                <label for="id_curso">Código: </label>
                <input type="number" readonly id="id_curso" name="id_curso" value="<?php echo $cu->id_curso; ?>">
                <br>
                <legend>Dados Curso</legend>
                <label for="id_curso">Descricao: </label>
                <input size="40" readonly value="<?php echo $cu->descricao; ?>" placeholder="Digite aqui o nome do curso" name="descricao" id="descricao" type="text">
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