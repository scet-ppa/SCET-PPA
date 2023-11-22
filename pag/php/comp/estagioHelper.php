<?php
    include_once 'estagio.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

   if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        if($tipo === 'cad_estagio'){
            cadastrarAluno();
            /*echo $_SERVER['DOCUMENT_ROOT'];*/
            header('Location:../../html/cad_estagio.php');
        }else if($tipo === 'editar_estagio'){
            editar_estagio();
            header('Location:cad_estagio.php');
        }else if($tipo === 'concluir_estagio'){
            concluir_estagio();
            header('Location:cad_estagio.php');
        }
   }

   function  editar_estagio(){
        $estagio = Estagio::carregar($_POST['id_estagio']);
        $estagio->orientador = $_POST['orientador'];
        $estagio->data_inicio = $_POST['data_inicio'];
        $estagio->prev_termino = $_POST['prev_termino'];
       // $curso = $_POST['curso'];
       $estagio->id_empresa = $_POST['id_empresa'];
       $estagio->id_aluno = $_POST['id_aluno'];
       $estagio->situacao = $_POST['situacao'];
       $estagio->editar();
   }

   function  concluir_estagio(){
    $estagio = Estagio::carregar($_POST['id_estagio']);
    $estagio->orientador = $_POST['orientador'];
    $estagio->data_inicio = $_POST['data_inicio'];
    $estagio->prev_termino = $_POST['prev_termino'];
   // $curso = $_POST['curso'];
   $estagio->id_empresa = $_POST['id_empresa'];
   $estagio->id_aluno = $_POST['id_aluno'];
   $estagio->situacao = $_POST['situacao'];
   $estagio->concluir();
}

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