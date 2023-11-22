<?php
   include_once "../php/comp/empresaHelper.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="../css/cad_empresa.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>
    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/empresaHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cad_empresa">
                <legend>Dados da Empresa</legend>
                <label for="nome">Nome: </label>
                <input size="40" required placeholder="Digite aqui o nome da empresa" name="nome" id="nome" type="text">
            </fieldset>

            <a class="botao" href="home_coord.php">Voltar</a>
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>
    <div>
        <fieldset>
            <legend>Empresas Cadastradas</legend>
            <table id="mover">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th colspan="2">Ações</th>
                </tr>
                <?php
                $empresas = getEmpresas();
                foreach($empresas as $empresa){
                    echo '<tr>'; 
                    echo '<td>'.$empresa->id_empresa.'</td>  ';
                    echo '<td>'.$empresa->nome.'</td> '; 

                    echo '<td> <a class="editar"  href="editar-empresa.php?id_empresa='.$empresa->getIdEmpresa().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir-empresa.php?id_empresa='.$empresa->getIdEmpresa().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>