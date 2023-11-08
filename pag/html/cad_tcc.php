<?php
   include_once "../php/comp/tccHelper.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de TCC</title>
    <link rel="stylesheet" href="../css/cad_tcc.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>

    <fieldset>
        <legend>Formulário de cadastro</legend>

        <form name="formCad" method="POST" action="../php/comp/tccHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cad_tcc">
                <legend>Dados do TCC</legend>
                <label for="id_professor">Nome do Professor: </label>
                <input size="40" required placeholder="Digite aqui o nome do professor" name="id_professor" id="id_professor" type="text">
                <br>
                <label for="id_empresa">Nome da Empresa: </label>
                <input size="40" required placeholder="Digite aqui o nome do aluno" name="id_empresa" id="id_empresa" type="text">
                <br>
                <label for="id_aluno">Nome do Aluno: </label>
                <input size="40" required placeholder="Digite aqui o nome do empresa" name="id_aluno" id="id_aluno" type="text">
                <label for="data_inicio">Data de inicio: </label>
                <input size="40" required placeholder="Digite aqui a data de inicio" name="data_inicio" id="data_inicio" type="text">
                <br>
                <label for="prev_termino">Previa de Termino: </label>
                <input size="40" required placeholder="Digite aqui a previa de termino" name="prev_termino" id="prev_termino" type="text">
                <label for="situacao">Situação: </label>
                <input size="40" required placeholder="Digite aqui a situação do estagio" name="situacao" id="situacao" type="text"> 

            </fieldset>

            <input type="reset" value="Excluir">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>

    <div>
        <fieldset>
            <legend>TCCs Cadastrados</legend>
            <table id="mover">
                <tr>
                    <th>Código</th>
                    <th>Aluno</th>
                    <th>Professor</th>
                    <th>Empresa</th>
                    <th>Data de Inicio</th>
                    <th>Previa de termino</th>
                    <th>Situação</th>
                </tr>
                <?php
                $estagios = getEstagios();
                foreach($estagios as $estagio){
                    echo '<tr>'; 
                    echo '<td>'.$estagio->id_estagio.'</td>  ';
                    echo '<td>'.$estagio->id_professor.'</td> ';
                    echo '<td>'.$estagio->id_aluno.'</td> ';
                    echo '<td>'.$estagio->id_empresa.'</td> ';
                    echo '<td>'.$estagio->data_inicio.'</td> ';
                    echo '<td>'.$estagio->prev_termino.'</td> ';
                    echo '<td>'.$estagio->situacao.'</td> ';

                    echo '<td> <a class="editar"  href="editar_curso.php?id_curso='.$curso->getIdCurso().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_curso.php?id_curso='.$curso->getIdCurso().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>