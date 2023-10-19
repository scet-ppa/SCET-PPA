<?php
include_once 'professor.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';


if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo === 'cad_prof'){
        cadastrarProfessor();
        header('Location:home_prof.html');
    }/*else if($tipo === 'excluir_prof'){
        excluir_prof();
        header('Location:index.php');
    }else if($tipo === 'editar_prof'){
        editar_prof();
        header('Location:index.php');
    }*/
}

/*function  editar_prof(){
    $prof = prof::carregar($_POST['id_prof']);
    $prof->nome = $_POST['nome'];
    $prof->telefone = $_POST['telefone'];
    $prof->email = $_POST['email'];
   // $curso = $_POST['curso'];
   $prof->nascimento = $_POST['nascimento'];
   $prof->sexo = $_POST['sexo'];
   $prof->editar();
}*/

function cadastrarProfessor(){
  //  echo "oi";
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $turma = $_POST['turma'];
    $matricula = $_POST['matricula'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $professor = new Professor($nome,$curso,$turma,$matricula, $email,$senha);
    $professor->inserir();

}

function getProfessores(){
    try{
        $banco = new Banco();
        $conn = $banco->conectar();
        $stmt = $conn->prepare("select * from professor");
        $stmt->execute();
       // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $professores = array();
        foreach($stmt->fetchAll() as $v => $value){
            $professor = new Professor($value['nome'], $value['curso'], $value['email'], $value['id_curso'], $value['email'],
            $value['senha']);
            $professor->setIdProfessor( $value['id_professor']);
            array_push($professores,$professor);
        }

        //var_dump($professores);
        return $professores;

    }catch(PDOException $e){
        echo "Erro " . $e->getMessage();
    }
}

// getprofessores();

/*    $professore = new professore('Pedro Carvalho','75 99147 8160',
'pedro@gmail.com',2,'01-08-2014','Masculino');
$professore->inserir();*/
?>