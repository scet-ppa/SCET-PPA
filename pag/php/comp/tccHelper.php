<?php

include_once 'tcc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo === 'cad_tcc'){
        cadastrarTCC();
        header('Location:../../html/cad_tcc.php');
    }else if($tipo === 'excluir_tcc'){
        excluir_tcc();
        header('Location:../../html/cad_tcc.php');
    }else if($tipo === 'editar_tcc'){
        editar_tcc();
        header('Location:../../html/cad_tcc.php');
    }

}

function editar_tcc(){
    $tcc = TCC::carregar($_POST['id_tcc']);
    $tcc->tema = $_POST['tema'];
   // $curso = $_POST['curso'];
    $tcc->editar();
}

function excluir_tcc(){
    $curso = TCC::carregar($_POST['id_tcc']);
    $curso->excluir_tcc();
}

function cadastrarTCC(){
    $tema = $_POST['tema'];
    $tcc = new TCC($tema);
    $tcc->inserir();
}

function getTCCS(){
    try{
        $banco = new Banco();
        $conn = $banco->conectar();
        $stmt = $conn->prepare("select * from tcc");
        $stmt->execute();
       // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tccs = array();
        foreach($stmt->fetchAll() as $v => $value){
            $tcc = new tcc($value['tema']);
            $tcc->setIdTCC($value['id_tcc']);
            array_push($tccs,$tcc);
        }
       return $TCCS;

    }catch(PDOException $e){
        echo "Erro " . $e->getMessage();
    }
}

?>