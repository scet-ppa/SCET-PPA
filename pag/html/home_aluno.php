<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home: Aluno</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/home_aluno.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
</head> 
<body>

    <div class="label">
        <div class="titulo">Olá, bem-vindo!</div>
        </div>

<!--Barra lateral-->
    <div class="container">
    <div class="navegacao">
        <ul>
            <li class="list">
                <a href="../html/usuario.html">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <span class="list">Usuario</span>
                </a>
            </li>
            <li class="list">
                <a href="../html/home_aluno.html">
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
                <a href="../html/prof-aluno.html">
                    <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                    <span class="list">Professores</span>
                </a>
            </li>
            <li class="list">
                <a href="../html/estagio_aluno.html">
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
                <a href="../html/pendente_aluno.html">
                    <span class="icon"><ion-icon name="alert-circle-outline"></ion-icon></span>
                    <span class="list">Pendentes</span>
                </a>
            </li>
            <li class="list">
                <a href="../html/">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="list">Sair</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!--Tabela que irá mostrar as informações de cadastro do aluno no sistema-->
<div id="mover">
<fieldset>
    <legend>Dados do(a) Aluno(a)</legend>
    <table>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Matrícula</th>
                <th>Curso</th>
                <th>Turma</th>
                <th>Foto</th>
            </tr>

        <tbody>
            <tr>
                <td>Nome do Aluno completo</td>
                <td>email@example.com</td>
                <td>20201910015</td>
                <td>Curso de Exemplo</td>
                <td>732</td>
                <td><img src="../img/perfil.png" alt="Foto de Perfil"></td>
            </tr>
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