<?php
include_once"../php/comp/estagioHelper.php";
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estágio</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQ3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/coor-tcc.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head>

<body>
    <div class="container">
        <div class="navegacao">
            <ul>
                <li class="list">
                    <a href="../html/usuario.php">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="list">Usuario</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/home_coord.php">
                        <span class="icon"><ion-icon name="notifications-outline"></ion-icon></span>
                        <span class="list">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/mensagens_coord.php">
                        <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                        <span class="list">Mensagens</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/notificacoes_coord.php">
                        <span class="icon"><ion-icon name="notifications-outline"></ion-icon></span>
                        <span class="list">Notificações</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/prof-coord.php">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="list">Professores</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/estagio_coord.php">
                        <span class="icon"><ion-icon name="clipboard"></ion-icon></span>
                        <span class="list">Estágio</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/coor-tcc.php">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="list">TCC</span>
                    </a>
                </li>
                <li class="list">
                    <a href="cad_empresa.php">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                        <span class="list">Empresas</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/pendente_coord.php">
                        <span class="icon"><ion-icon name="alert-circle-outline"></ion-icon></span>
                        <span class="list">Pendentes</span>
                    </a>
                </li>

                <li class="list">
                    <a href="../php/usar/logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="list">Sair</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
   

    <div class="content">
        <div id="busca">
            <input type="text" id="txtBusca" placeholder="Pesquisar"/>
            <span class="icon"></span>
        </div>
    
    <a class="cad-tcc" href="../html/cad_tcc.php">CADASTRAR</a>
       
        <fieldset>
            <legend>Estágios Cadastrados</legend>
            <table class="estudantes">
                <tr class="info">
                    <th>Aluno</th>
                    <th>Empresa</th>
                    <th>Orientador</th>
                    <th>Data de ínico</th>
                    <th>Prévia de término</th>
                    <th>Status</th>
                    <th colspan="3">Ações</th>
                </tr>
    <?php
    $estagios = getEstagios();
    foreach($estagios as $estagio){
        echo '<tr>'; 
        echo '<td>'.$estagio->nome_aluno.'</td> ';
        echo '<td>'.$estagio->nome_empresa.'</td> ';
        echo '<td>'.$estagio->nome_professor.'</td> ';
        echo '<td>'.$estagio->data_inicio.'</td> ';
        echo '<td>'.$estagio->prev_termino.'</td> ';
        echo '<td>'.$estagio->situacao.'</td> ';
    }
    ?>
                  <!-- <td> <a class="doc" href="#">Documentação</a></td>--> 
                    <td> <a class="editar" href="../html/cad_tcc.php">Editar</a></td>
                    <td> <a class="excluir" href="../html/cad_tcc.php">Excluir</a></td>
                    <td> <a class="concluir" href="../html/cad_tcc.php">Concluir </a></td>
    
                </tr>
            </table>
        </fieldset>
    
    
    </div>
   
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        const list = document.querySelectorAll('.list');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('active'));
            this.classList.add('active'); 
        }
            list.forEach((item) =>
            item.addEventListener('click', activeLink)); 
    
    </script>
</body>
</html>