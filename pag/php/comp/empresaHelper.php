<?php

include_once 'empresa.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo === 'cad_empresa'){
        cadastrarEmpresa();
        header('Location:../../html/cad_empresa.php');
    }else if($tipo === 'excluir_empresa'){
        excluir_empresa();
        header('Location:../../html/cad_empresa.php');
    }else if($tipo === 'editar_empresa'){
        editar_empresa();
        header('Location:../../html/cad_empresa.php');
    }

}

function editar_empresa(){
    $empresa = Empresa::carregar($_POST['id_empresa']);
    $empresa->nome = $_POST['nome'];
    $empresa->nome = $_POST['cep'];
    $empresa->nome = $_POST['numero'];
    $empresa->nome = $_POST['complemento'];
    $empresa->nome = $_POST['bairro'];
    $empresa->nome = $_POST['municipio'];
    $empresa->nome = $_POST['endereco'];
    $empresa->nome = $_POST['uf'];

   // $empresa = $_POST['empresa'];
    $empresa->editar();
}

function excluir_empresa(){
    $empresa = Empresa::carregar($_POST['id_empresa']);
    $empresa->excluir_empresa();
}

function cadastrarEmpresa(){
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $municipio = $_POST['municipio'];
    $endereco = $_POST['endereco'];
    $uf = $_POST['uf'];
    $empresa = new Empresa($nome, $cep, $numero, $complemento, $bairro, $municipio, $endereco, $uf);
    $empresa->inserir();
}


function getEmpresas(){
    try{
        $banco = new Banco();
        $conn = $banco->conectar();
        $stmt = $conn->prepare("select * from empresa");
        $stmt->execute();
       // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $empresas = array();
        foreach($stmt->fetchAll() as $v => $value){
            $empresa = new Empresa($value['nome'], $value['cep'],  $value['numero'], $value['complemento'], $value['bairro'], $value['municipio'], $value['endereco'], $value['uf']);
            $empresa->setIdEmpresa($value['id_empresa']);
            array_push($empresas,$empresa);
        }
       return $empresas;

    }catch(PDOException $e){
        echo "Erro " . $e->getMessage();
    }
}



?>