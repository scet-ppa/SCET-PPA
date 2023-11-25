<?php
    include_once 'coordenador.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

   if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        if($tipo === 'cad_coordenador'){
            cadastrarCoordenador();
          
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

    function cadastrarCoordenador(){
      //  echo "oi";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $coordenador = new Coordenador($nome, $email, $senha);
        $coordenador->inserir();
    }

   /*function excluir_coordenador(){
        $coordenador = Coordenador::carregar($_POST['id_coordenador']);
        $coordenador->excluir_coordenador();
   }*/

    function getCoordenador(){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from coordenador");
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $coordenadores = array();
            foreach($stmt->fetchAll() as $v => $value){
                $coordenador = new Coordenador($value['nome'], $value['email'], $value['senha']);
                $coordenador->setIdCoordenador( $value['id_coordenador']);
                array_push($coordenadores,$coordenador);
            }

            //var_dump($coordenadores);
            return $coordenadores;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }

   // getcoordenadores();

/*    $coordenador = new Coordenador('Pedro Carvalho','75 99147 8160',
    'pedro@gmail.com',2,'01-08-2014','Masculino');
    $coordenador->inserir();*/
?>