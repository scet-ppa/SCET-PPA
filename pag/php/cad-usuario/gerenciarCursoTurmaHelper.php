<?php
include_once "cursoHelper.php";

include_once "turmaHelper.php";

$id_curso= filter_input(
    INPUT_GET,
    'id_curso',
    FILTER_SANITIZE_NUMBER_INT
);

$cu = Curso::carregar($id_professor);

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cad_Curso</title>
    <link rel="stylesheet" href="./assets/estilo.css">
</head>

<body>

    <?php
        include_once 'nav.php';
  ?>


    <h1>Gerência de Professores</h1>
    <fieldset>
        <legend>Formulário de cadastro</legend>
        <form name="formCad" method="POST" action="ProfessorHelper.php">
            <fieldset>
                <input style="display: none" name="tipo" id="tipo" type="text" value="vincular_professor">
                <legend>Dados Professor</legend>
                <label for="id_professor">Código: </label>
                <!-- COmentário -->
                <input readonly name="id_professor" id="id_professor" type="number" value="<?php echo $prof->id_professor; ?>">
                <label for="nome">Nome: </label>
                <!-- COmentário -->
                <input size="40" readonly  placeholder="Digite aqui o nome do professor" value="<?php echo  $prof->nome;?>" name="nome" id="nome" type="text">
            </fieldset>
            <fieldset>
                <legend>Informações acadêmicas</legend>
                <label for="cursos">Formações:</label>
                <select name="id_formacao" id="formacao">
                    <?php
                    $formacoes = getFormacoes();
                    foreach($formacoes as $formacao){
                        echo '<option value="'.$formacao->getIdFormacao().'">
                        '.$formacao->titulo.'</option>';
                    }
                    ?>
                </select>
             
            </fieldset>

            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">

        </form>
    </fieldset>

    <div>
        <fieldset>
            <legend>Formacoes</legend>
            <table id="estudantes">
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th colspan="3">Ações</th>
                </tr>
                <?php
                $formacoes = getFormacoes_prof($id_professor);
                foreach ($formacoes as $formacao) {
                    echo '<tr>';
                    echo '<td>' . $formacao->id_formacao . '</td>  ';
                    echo '<td>' . $formacao->titulo . '</td> ';
                    echo '<td> <a class="editar"  href="editar_curso.php?id_curso=' . $formacao->getIdFormacao() . '">Editar</a></td> ';
                    echo '<td> <a class="excluir"  href="excluir_curso.php?id_curso=' . $formacao->getIdFormacao(). '">Excluir</a></td> ';
                    echo '</tr> ';
                }
                ?>

            </table>
        </fieldset>
    </div>

</body>

</html>