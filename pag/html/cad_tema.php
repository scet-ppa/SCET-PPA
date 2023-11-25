<?php
   include_once "../php/comp/temaHelper.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Temas de TCC</title>
    <link rel="stylesheet" href="../css/cad_empresa.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/temaHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cad_tema">
                <legend>Dados de Temas de TCC</legend>
                <label for="nome">Nome: </label>
                <input size="40" required placeholder="Digite aqui o nome do tema" name="nome" id="nome" type="text">
            </fieldset>

            <a class="botao" href="home_coord.php">Voltar</a>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>
    <div>
        <fieldset>
            <legend>Temas de TCC'sCadastrados</legend>
            <table id="mover">
                <tr>
                    <th>Código</th>
                    <th>Tema</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php
                $temas = getTemas();
                foreach($temas as $tema){
                    echo '<tr>'; 
                    echo '<td>'.$tema->id_tema.'</td>  ';
                    echo '<td>'.$tema->nome.'</td> '; 

                    echo '<td> <a class="editar"  href="editar_tema.php?id_tema='.$tema->getIdTema().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_tema.php?id_tema='.$tema->getIdTema().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>