<?php
   include_once "../php/comp/tccHelper.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro de TCC</title>
    <link rel="stylesheet" href="../css/cad_tcc.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>
<body>

    <fieldset>
        <legend>Formulário de Cadastro</legend>
        <form name="formCad" method="POST" action="../php/comp/tccHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="cad_estagio">
                <legend>Dados do TCC</legend>

                <div>
                <label for="id_aluno">Nome do Aluno: </label>
                <input class="input1" size="40" required placeholder="Digite aqui o nome do Aluno" name="aluno" id="aluno" type="text">
                </div>

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

            <a class="botao" href="home_coord.php">Voltar</a>
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
                    <th>Orientador</th>
                    <th>Tema</th>
                    <th>Situação</th>
                    <th>Data de ínicio</th>
                    <th>Prévia de término</th>
                </tr>

                <?php
                $tccs = getTCCS();
                foreach($tccs as $tcc){
                    echo '<tr>'; 
                    echo '<td>'.$tcc->id_tcc.'</td>  ';
                    echo '<td>'.$tcc->id_aluno.'</td> ';
                    echo '<td>'.$tcc->id_orientador.'</td> ';
                    echo '<td>'.$tcc->tema.'</td> ';
                    echo '<td>'.$tcc->situacao.'</td> ';
                    echo '<td>'.$tcc->data_inicio.'</td> ';
                    echo '<td>'.$tcc->prev_termino.'</td> ';

                    echo '<td> <a class="editar"  href="editar_tcc.php? id_tcc='.$tcc->getIdTCC().'">Editar</a></td> ';  
                    echo '<td> <a class="excluir"  href="excluir_tcc.php?id_tcc='.$tcc->getIdTCC().'">Excluir</a></td> '; 
                    echo '</tr> ';
                }
                ?> 

                </table>
        </fieldset>
    </div>
    
</body>
</html>