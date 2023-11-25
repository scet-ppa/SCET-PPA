<?php
    include_once 'estagio.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

   if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        if($tipo === 'cad_estagio'){
            cadastrarEstagio();
            /*echo $_SERVER['DOCUMENT_ROOT'];*/
            header('Location:../../html/cad_estagio.php');
        }else if($tipo === 'editar_estagio'){
            editar_estagio();
            header('Location:../../html/cad_estagio.php');
       /* }else if($tipo === 'excluir_estagio'){
            excluir_estagio();
            header('Location:../../html/cad_estagio.php');*/
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

   /*function excluir_estagio(){
    $estagio = Estagio::carregar($_POST['id_estagio']);
    $estagio->excluir_estagio();
}*/

    function cadastrarEstagio(){
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
            $stmt = $conn->prepare("select estagio.id_estagio, estagio.id_aluno, estagio.id_empresa, estagio.orientador, professor.nome as 'professor', aluno.nome as 'estudante', empresa.nome as 'empresa', date_format(estagio.data_inicio, '%d/%m/%Y') as data_inicio, date_format(estagio.prev_termino, '%d/%m/%Y') as prev_termino, estagio.situacao from estagio inner join aluno on (estagio.id_aluno = aluno.id_aluno)
            inner join professor on (estagio.orientador = professor.id_professor)
            inner join empresa on (estagio.id_empresa = empresa.id_empresa)
            where estagio.id_estagio = id_estagio;");
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $estagios = array();
            foreach($stmt->fetchAll() as $v => $value){
             //   var_dump($value);
           ///     break;
                $estagio = new Estagio($value['situacao'], $value['orientador'], $value['id_aluno'], $value['id_estagio'], $value['id_empresa'],
                $value['data_inicio'], $value['prev_termino']);
                $estagio->setIdEstagio( $value['id_estagio']);
                $estagio->nome_aluno = $value['estudante'];
                $estagio->nome_professor = $value['professor'];
                $estagio->nome_empresa = $value['empresa'];
                $estagio->data_inicio = $value['data_inicio'];
                $estagio->prev_termino = $value['prev_termino'];
                array_push($estagios,$estagio);
            }

           // var_dump($alunos);
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