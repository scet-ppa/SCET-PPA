<?php
include_once "../php/comp/temaHelper.php";
//include_once 'CursoHelper.php';

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

    <title>Excluir Tema</title>
</head>

<body>
    <h1>Excluir Tema</h1>
    <fieldset>
        <legend>Informação Geral</legend>
        <form name="formCad" method="POST" action="../php/comp/temaHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="excluir_tema">
                
                <label for="id_tema">Código: </label>
                <input type="number" readonly id="id_tema" name="id_tema" value="<?php echo $tem->id_tema; ?>">
                <label for="id_tema">Nome do Tema: </label>
                <input size="40" value="<?php echo $tem->nome; ?>" placeholder="Digite aqui o nome do tema " name="excluir_tema" id="Id_tema" type="text">
                <br>
            </fieldset>

            <fieldset>
                <input type="checkbox" name="excluir" id="excluir">
                <label for="excluir">Tenho ciência de que estou excluindo o registro de um tema.</label>
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