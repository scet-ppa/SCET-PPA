<?php

include_once 'professor.php';
include_once 'coordenador.php';
include_once 'aluno.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

if(isset($_POST['tipo'])){
    $tipo = $_POST['usuario'];
    if($tipo === 'aluno'){
        cadastrarCurso();
        header('Location:index.php');
    }else if($tipo === 'professor'){
        excluir_curso();
        header('Location:index.php');
    }else if($tipo === 'editar_curso'){
        editar_curso();
        header('Location:index.php');
    }

}

function editar_curso(){
    $curso = Curso::carregar($_POST['id_curso']);
    $curso->descricao = $_POST['descricao'];
   // $curso = $_POST['curso'];
    $curso->editar();
}

function excluir_curso(){
    $curso = Curso::carregar($_POST['id_curso']);
    $curso->excluir_curso();
}


function cadastrarCurso(){
    $descricao = $_POST['descricao'];
    $curso = new Curso($descricao);
    $curso->inserir();
}


function getCursos(){
    try{
        $banco = new Banco();
        $conn = $banco->conectar();
        $stmt = $conn->prepare("select * from curso");
        $stmt->execute();
       // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cursos = array();
        foreach($stmt->fetchAll() as $v => $value){
            $curso = new Curso($value['descricao']);
            $curso->setIdCurso($value['id_curso']);
            array_push($cursos,$curso);
        }
       return $cursos;

    }catch(PDOException $e){
        echo "Erro " . $e->getMessage();
    }
}



?>