<!DOCTYPE html>
<html lang="pt-br">
<<<<<<< HEAD
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor: TCC</title>
    <link rel="stylesheet" type="text/css" href="../css/prof-tcc.css">
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
                    <a href="../html/home_aluno.php">
                        <span class="icon"><ion-icon name="notifications-outline"></ion-icon></span>
                        <span class="list">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/mensagens_aluno.html">
                        <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                        <span class="list">Mensagens</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/notificacoes_aluno.html">
                        <span class="icon"><ion-icon name="notifications-outline"></ion-icon></span>
                        <span class="list">Notificações</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/prof-aluno.php">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="list">Professores</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/estagio_aluno.php">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                        <span class="list">Estágio</span>
                    </a>
                </li>
                <li class="list">
                    <a href="../html/aluno-tcc.html">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="list">TCC</span>
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

        <div class="mover">
=======

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCET - TCC</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/prof-estagio.css">
</head>

<body>
    <div class="container">
    <div class="navegacao">
        <ul>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <span class="list">Usuario</span>
                </a>
            </li>
            <li class="list">
                <a href="home_prof.php">
                    <span class="icon"><ion-icon name="home"></ion-icon></span>
                    <span class="list">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="mensagens_prof.php">
                    <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                    <span class="list">Mensagens</span>
                </a>
            </li>
            <li class="list">
                <a href="notificacoes_prof.php">
                    <span class="icon"><ion-icon name="notifications-outline"></ion-icon></span>
                    <span class="list">Notificações</span>
                </a>
            </li>
            <li class="list">
                <a href="prof-estagio.php">
                    <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="list">Estágio</span>
                </a>
            </li>
            <li class="list">
                <a href="prof-tcc.php">
                    <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                    <span class="list">TCC</span>
                </a>
            </li>
            <li class="list">
                <a href="pendente_prof.php">
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

        <div class="grid-item">
            <div id="divBusca">
                <!--<span class="search-btn"><ion-icon name="search-outline"></ion-icon></span>-->
                <input type="text" id="txtBusca" placeholder="Buscar..."/>
              </div>

        <div class="table">

>>>>>>> c2fd4a1a695f237af8e231228f89e50db627911d
        <fieldset>
            <table id="estudantes">
                <tr class="info">
                    <th>Aluno</th>
                    <th>Orientador</th>
                    <th>Tema</th>
                    <th>Situação</th>
                    <th>Data de Iniciação</th>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td> <a class="editar" href="#">Editar</a></td>
                    <td> <a class="excluir" href="#">Excluir</a></td>
                    <td> <a class="concluir" href="#">Concluir </a></td>
    
                </tr>
            </table>
        </fieldset>
<<<<<<< HEAD
</div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script>
            const list = document.querySelectorAll('.list');
            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('active'));
                this.classList.add('active');
            }
            list.forEach((item) =>
                item.addEventListener('click', activeLink));
        </script>

</body>
</html>
=======
        </div>
    </div>
    </div>

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const list = document.querySelectorAll('.list');
        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink));

    </script>
</body>

</html>
>>>>>>> c2fd4a1a695f237af8e231228f89e50db627911d
