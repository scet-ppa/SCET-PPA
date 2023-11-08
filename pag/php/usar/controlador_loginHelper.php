<?php
session_start(); 
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/cad-usuario/aluno.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/cad-usuario/professor.php';
include_once    $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/cad-usuario/coordenador.php';

if(isset($_POST['tipoUser'])){
    $tipo = $_POST['tipoUser'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if($tipo === 'prof'){

        echo ' login professor ' ; 
        header('Location:../../html/home_prof.php');
    }else if($tipo === 'aluno'){
        $aluno = Aluno::getAlunoUsuario($email, $senha); 
        if(isset($aluno)){
            header('Location:../../html/home_aluno.php');
        } else{
            echo ' aluno não existe ' ; 
        }
    
        
    }else if($tipo === 'coord'){
        $coord = Coordenador::getCoordenadorUsuario($email, $senha); 
        var_dump($coord);
        if(isset($coord)){
            $_SESSION["nome"] = $coord->nome;
            $_SESSION["email"] = $coord->email;

            header('Location:../../html/home_coord.php');           
        } else{
            echo ' coordenador não existe ' ; 
        }

    }
}

