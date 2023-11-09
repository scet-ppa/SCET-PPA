<?php
    include_once 'estagio.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

   if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        if($tipo === 'cad_estagio'){
            cadastrarAluno();
            /*echo $_SERVER['DOCUMENT_ROOT'];*/
            header('Location:../../html/cad_estagio.php');
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

    function cadastrarAluno(){
      //  echo "oi";
        $situacao = $_POST['situacao'];
        $orientador = $_POST['orientador'];
        $id_aluno = $_POST['id_aluno'];
        $id_empresa = $_POST['id_empresa'];
        $data_inicio = $_POST['data_inicio'];
        $prev_termino = $_POST['prev_termino'];

        $estagio = new Estagio($situacao,$orientador,$id_aluno,$id_empresa,$data_inicio,$prev_termino);
        $estagio->inserir();

    }

   /*function excluir_aluno(){
        $aluno = Aluno::carregar($_POST['id_aluno']);
        $aluno->excluir_aluno();
   }*/

    function getEstagios(){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from estagio");
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $estagios = array();
            foreach($stmt->fetchAll() as $v => $value){
                $estagio = new Estagio($value['situacao'], $value['orientador'], $value['id_aluno'], $value['id_estagio'], $value['id_empresa'],
                $value['data_inicio'], $value['prev_termino']);
                $estagio->setIdAluno( $value['id_estagio']);
                array_push($estagios,$estagio);
            }

            //var_dump($alunos);
            return $estagios;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }

   // getAlunos();

/*    $aluno = new Aluno('Pedro Carvalho','75 99147 8160',
    'pedro@gmail.com',2,'01-08-2014','Masculino');
    $aluno->inserir();*/
?>