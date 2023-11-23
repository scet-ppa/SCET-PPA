<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.guilhermematossm@gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'guilhermematossm@gmail.com';
    $mail->Password = 'Travesseiro12';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('guilhermematossm@gmail.com');
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $message;
    $mail->send();

    header("Location: ./index.php?=email_sent!");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens - Aluno</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQ3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/mensagens_coord.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/logo-scet.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/allencasul/lonica@d9dbccfa5b0a4666760e4f72b28effa775c56857/css/cdn/lonica.css" integrity="sha256-E1S8yAbnRZ6uM4sA6NMSgTyoDsdK1ZCjBYF3lqXqv6Q=" crossorigin="anonymous">

</head>

<body>

    <div class="barrinha">
        <div class="navegacao">
            <ul>
                <li class="list">
                    <a href="../html/usuario.html">
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
                    <a href="../html/inicio.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="list">Sair</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <form class="display-grid row-gap-1-rem" method="post">
            <input class="box-shadow-primary" name="name" type="text" placeholder="Name" autocomplete="off" required />
            <input class="box-shadow-primary" name="email" type="email" placeholder="Email" autocomplete="off" required />
            <input class="box-shadow-primary" name="subject" type="text" placeholder="Subject" autocomplete="off" required />
            <textarea class="box-shadow-primary" name="message" placeholder="Message..." required></textarea>
            <button type="submit" name="send">
              Send <i class="fa-solid fa-paper-plane color-white margin-left-1-rem"></i>
            </button>
          </form>
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
            src="https://kit.fontawesome.com/1e8d61f212.js"
            
    </script>
</body>
</html>