<?php

/*include_once 'controlador_login.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';*/


if(isset($_POST['tipoUser'])){
    $tipo = $_POST['tipoUser'];
    if($tipo === 'prof'){

        echo ' login professor ' ; 
        /*header('Location:../../html/home_prof.php');*/
    }else if($tipo === 'aluno'){
        echo ' login aluno ' ; 
       /* header('Location:index.php');*/
    }else if($tipo === 'coord'){
        echo ' login coordenador ' ; 
      /*  header('Location:index.php');*/
    }
}

