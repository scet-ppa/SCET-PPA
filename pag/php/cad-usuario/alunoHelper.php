<?php
    include_once 'aluno.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

   if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        if($tipo === 'cad_aluno'){
           //var_dump($_POST); 
            cadastrarAluno();
            echo $_SERVER['DOCUMENT_ROOT'];
            header('Location:../../html/login.php');
        }/*else if($tipo === 'excluir_aluno'){
            excluir_aluno();
            header('Location:index.php');
        }else if($tipo === 'editar_aluno'){
            editar_aluno();
            header('Location:index.php');
        }*/
   }

   /*function  editar_aluno(){
        $aluno = Aluno::carregar($_POST['id_aluno']);
        $aluno->nome = $_POST['nome'];
        $aluno->telefone = $_POST['telefone'];
        $aluno->email = $_POST['email'];
       // $curso = $_POST['curso'];
       $aluno->nascimento = $_POST['nascimento'];
       $aluno->sexo = $_POST['sexo'];
       $aluno->editar();
   }*/

    function cadastrarAluno(){
      //  echo "oi";
        $nome = $_POST['nome'];
        $curso = $_POST['curso'];
        $turma = $_POST['turma'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $aluno = new Aluno($nome,$curso,$turma,$matricula, $email,$senha);
        $aluno->inserir();

    }

   /*function excluir_aluno(){
        $aluno = Aluno::carregar($_POST['id_aluno']);
        $aluno->excluir_aluno();
   }*/

    function getAlunos(){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from aluno");
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $alunos = array();
            foreach($stmt->fetchAll() as $v => $value){
                $aluno = new Aluno($value['nome'], $value['email'], $value['id_curso'], $value['id_turma'], $value['email'],
                $value['senha']);
                $aluno->setIdAluno( $value['id_aluno']);
                array_push($alunos,$aluno);
            }

            //var_dump($alunos);
            return $alunos;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }

   // getAlunos();

/*    $aluno = new Aluno('Pedro Carvalho','75 99147 8160',
    'pedro@gmail.com',2,'01-08-2014','Masculino');
    $aluno->inserir();*/
?>