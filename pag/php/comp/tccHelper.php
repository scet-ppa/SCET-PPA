<?php
    include_once 'tcc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

   if(isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        if($tipo === 'cad_tcc'){
            
            //echo var_dump($_POST);
            cadastrarTCC();

        header('Location:../../html/cad_tcc.php');
        }else if($tipo === 'editar_tcc'){
            editar_tcc();
            header('Location:../../html/cad_tcc.php');
       /* }else if($tipo === 'excluir_tcc'){
            excluir_tcc();
            header('Location:../../html/cad_tcc.php');*/
        }
   }

   function editar_tcc(){
        $tcc = TCC::carregar($_POST['id_tcc']);
        $tcc->id_professor = $_POST['id_professor'];
        $tcc->data_inicio = $_POST['data_inicio'];
        $tcc->prev_termino = $_POST['prev_termino'];
        $tcc->tema = $_POST['tema'];
        $tcc->id_aluno = $_POST['id_aluno'];
        $tcc->situacao = $_POST['situacao'];
        $tcc->editar();
   }

   /*function excluir_tcc(){
    $tcc = TCC::carregar($_POST['id_tcc']);
    $tcc->excluir_tcc();
}*/

    function cadastrarTCC(){
        $situacao = $_POST['situacao'];
        $id_professor = $_POST['id_professor'];
        $id_aluno = $_POST['id_aluno'];
        $tema = $_POST['tema'];
        $data_inicio = $_POST['data_inicio'];
        $prev_termino = $_POST['prev_termino'];

        $tcc = new TCC($situacao,$id_professor,$id_aluno,$tema,$data_inicio,$prev_termino);
        $tcc->inserir();

    }

   /*function excluir_tcc(){
        $aluno = Aluno::carregar($_POST['id_aluno']);
        $aluno->excluir_aluno();
   }*/

    function getTCCS(){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select tcc.id_tcc, tcc.id_aluno, tcc.id_professor, professor.nome as 'professor',  aluno.nome as 'estudante', date_format(tcc.data_inicio, '%d/%m/%Y') as data_inicio, date_format(tcc.prev_termino, '%d/%m/%Y') as prev_termino, tcc.situacao, tcc.tema
            from tcc inner join aluno on tcc.id_aluno = aluno.id_aluno inner join professor on tcc.id_professor = professor.id_professor
            where tcc.id_tcc = id_tcc;");
            $stmt->execute();
            $tccs = array();
//            $situacao, $id_professor, $id_aluno, $tema, $data_inicio, $prev_termino
            foreach($stmt->fetchAll() as $v => $value){
                $tcc = new TCC ($value['situacao'], $value['id_professor'],
                $value['id_aluno'],  $value['tema'], $value['data_inicio'], $value['prev_termino']);
              /*  $tcc->id_aluno = $value['id_aluno'];
                $tcc->id_professor = $value['id_professor'];
                $tcc->tema = $value['tema'];
                $tcc->data_inicio = $value['data_inicio'];
                $tcc->prev_termino = $value['prev_termino'];*/
                $tcc->setIdTCC($value["id_tcc"]);
                $tcc->nome_aluno = $value['estudante'];
                $tcc->nome_professor = $value['professor'];
                $tcc->data_inicio = $value['data_inicio'];
                $tcc->prev_termino = $value['prev_termino'];
                array_push($tccs,$tcc);
            }
           return $tccs;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }
?>