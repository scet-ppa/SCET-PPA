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
    <link rel="stylesheet" href="../css/cad_curso.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">

    <title>Excluir Empresa</title>
</head>

<body>
    <h1>Excluir Empresa</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/comp/empresaHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="excluir_empresa">
                
                <label for="id_empresa">Código: </label>
                <input type="number" readonly id="id_empresa" name="id_empresa" value="<?php echo $emp->id_empresa; ?>">
                <label for="id_empresa">Nome da Empresa: </label>
                <input size="40" value="<?php echo $emp->nome; ?>" placeholder="Digite aqui o nome da Turma" name="ano_letivo" id="ano_letivo" type="text">
                <br>
                
                <!-- COmentário -->
       
               
                
            </fieldset>

            <fieldset>
                <input type="checkbox" name="excluir" id="excluir">
                <label for="excluir">Tenho ciência de que estou excluindo o registro de uma empresa.</label>
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