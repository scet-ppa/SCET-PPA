<?php

include_once 'tema.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo === 'cad_tema'){
        cadastrarTema();
        header('Location:../../html/cad_tema.php');
    }else if($tipo === 'excluir_tema'){
        excluir_tema();
        header('Location:../../html/cad_tema.php');
    }else if($tipo === 'editar_tema'){
        editar_tema();
        header('Location:../../html/cad_tema.php');
    }

}

function editar_tema(){
    $tema = Tema::carregar($_POST['id_tema']);
    $tema->nome = $_POST['nome'];
   // $tema = $_POST['tema'];
    $tema->editar();
}

function excluir_tema(){
    $tema = Tema::carregar($_POST['id_tema']);
    $tema->excluir_tema();
}

function cadastrarTema(){
    $nome = $_POST['nome'];
    $tema = new Tema($nome);
    $tema->inserir();
}


function getTemas(){
    try{
        $banco = new Banco();
        $conn = $banco->conectar();
        $stmt = $conn->prepare("select * from tema");
        $stmt->execute();
       // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $temas = array();
        foreach($stmt->fetchAll() as $v => $value){
            $tema = new Tema($value['nome']);
            $tema->setIdTema($value['id_tema']);
            array_push($temas,$tema);
        }
       return $temas;

    }catch(PDOException $e){
        echo "Erro " . $e->getMessage();
    }
}



?>