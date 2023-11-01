<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';
include_once "../php/cad-usuario/alunoHelper.php";
include_once "../php/cad-usuario/professorHelper.php";
include_once "../php/cad-usuario/coordenadorHelper.php";

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo === 'cad_coordenador'){
        cadastrarCoordenador();
      
        header('Location:../../html/home_coord.php?usuario=$usuario,');
    }/*else if($tipo === 'excluir_aluno'){
        excluir_aluno();
        header('Location:index.php');
    }else if($tipo === 'editar_aluno'){
        editar_aluno();
        header('Location:index.php');
    }*/
}

?>