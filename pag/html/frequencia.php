<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/frequencia.css">
        <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
        <title>SCET - Controle de Frequencia</title>
    </head>
    
    <body>
        <div class="nav">
            <ul>
                <li><a href="avaliacao-aluno.php">Avaliação do Aluno</a></li>
                <li><a href="avaliacao-supervisor.php">Avaliação da Empresa</a></li>
                <li><a href="avaliacao-orientador.php"">Avaliação do Orientador</a></li>
                <li><a href="frequencia.php">Frequencia</a></li>
                <li style="float:right"><a class="active" href="home_aluno.php">Voltar</a></li>
              </ul>
        </div>


        <fieldset>
            <form action="" method="post">
                <fieldset>
                    
                    <legend>Informações do Aluno e Empresa</legend>
    
                    <div class="dados">

                        <label for="curso">Curso</label>
                        <input type="text" name="curso" value="" id="curso">
                        <br>

                        <label for="empresa">Nome da Instituição/Empresa:</label>
                        <input type="text" name="empresa" value="" id="empresa">
                        <br>

                        <label for="nome">Nome do Estagiário:</label>
                        <input type="text" name="nome" value="" id="nome">
                        <br>
                    </div>
                </fieldset>

                <h1>Controle de Frequência do Estágio Curricular</h1>

                <table class="custom">
                    <thead>
                        <tr class="numeracao">
                                <td class="table">Data</td>
                                <td class="table">Entrada</td>
                                <td class="table">Assinatura</td>
                                <td class="table">Saída</td>
                                <td class="table">Assinatura</td>
                                <td class="table">Total de Horas/Dia</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    </tbody>

                </table>
            </form>

</body>
</html>