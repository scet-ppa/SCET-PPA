<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/avalia-orientador.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
    <title>SCET - Avaliação do Orientador</title>
</head>
<body>
    <div class="nav">
        <ul>
            <li><a href="avaliacao-aluno.php">Avaliação do Aluno</a></li>
            <li><a href="avaliacao-supervisor.php">Avaliação da Empresa</a></li>
            <li><a href="avaliacao-orientador.php">Avaliação do Orientador</a></li>
            <li><a href="frequencia.php">Frequência</a></li>
            <li style="float:right"><a class="active" href="home_aluno.php">Voltar</a></li>
          </ul>
    </div>

    <fieldset>
        <form action="" method="post">
            
            <h1>Avaliação do Orientador</h1>            

            <fieldset>
                <fieldset>
                    <legend>Avaliação do Estágio</legend>
                    <table class="custom">
                        <thead>
                            <tr class="numeracao">
                                    <td class="table">Itens</td>
                                    <td class="table">Nota</td>
                                    <td class="table">Peso</td>
                                    <td class="table">Nota Final</td>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AVALIAÇÃO DA INSTITUIÇÃO/ EMPRESA (supervisor)</td>

                                    <td class="table"><input type="text" name="n1"></td>
                                    <td class="table">0,4</td>
                                    <td class="table"><input type="text" name="n1"></td>
                                    
                            </tr>

                            <tr>
                                <td>ORIENTAÇÃO (avaliação do estagiário nas orientações - orientador)</td>
                                <div class="table">
                                    <td class="table"><input type="text" name="n1"></td>
                                    <td class="table">0,2</td>
                                    <td class="table"><input type="text" name="n1"></td>
                                </div>

                            </tr>

                            <tr>
                                <td>RELATÓRIO FINAL DE ESTÁGIO (orientador)</td>
                                <td class="table"><input type="text" name="n1"></td>
                                <td class="table">0,3</td>
                                <td class="table"><input type="text" name="n1"></td>
                            </tr>

                            <tr>
                                <td>AUTOAVALIAÇÃO (aluno)</td>
                                <td class="table"><input type="text" name="n1"></td>
                                <td class="table">0,1</td>
                                <td class="table"><input type="text" name="n1"></td>

                            </tr>
                        </tbody>

                    </table>
                </fieldset>
            </fieldset>
</body>
</html>