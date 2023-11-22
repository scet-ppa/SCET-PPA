<?php
include_once 'turma.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo === 'cad_turma'){
        //var_dump($_POST);
        cadastrarTurma();
        header('Location:../../html/cad-turma.php');
    }else if($tipo === 'excluir_turma'){
        excluir_turma();
        header('Location:../../html/cad-turma.php');
    }else if($tipo === 'editar_turma'){
        editar_turma();
        header('Location:../../html/cad-turma.php');
    }

}

function editar_turma(){
    $turma = Turma::carregar($_POST['id_turma']);
    $turma->descricao = $_POST['descricao'];
    $turma->ano_letivo = $_POST['ano_letivo'];
   // $turma = $_POST['turma'];
    $turma->editar();
}

function excluir_turma(){
    $turma = Turma::carregar($_POST['id_turma']);
    $turma->excluir_turma();
}

function cadastrarTurma(){
    $descricao = $_POST['descricao'];
    $ano_letivo = $_POST['ano_letivo'];
    $turma = new Turma($descricao, $ano_letivo);
    $turma->inserir();
}


function getTurmas(){
    try{
        $banco = new Banco();
        $conn = $banco->conectar();
        $stmt = $conn->prepare("select * from turma");
        $stmt->execute();
       // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $turmas = array();
        foreach($stmt->fetchAll() as $v => $value){
            $turma = new Turma($value['descricao'], $value['ano_letivo']);
            $turma->setIdTurma($value['id_turma']);
            array_push($turmas,$turma);
        }
       return $turmas;

    }catch(PDOException $e){
        echo "Erro " . $e->getMessage();
    }
}



?>