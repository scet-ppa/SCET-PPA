<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class TCC{
    public $situacao;
    public $id_tcc;
    public $id_professor;
    public $id_aluno;
    public $nome_professor;
    public $nome_aluno;
    public $tema;
    public $data_inicio;
    public $prev_termino;

    function __construct($situacao, $id_professor, $id_aluno, $tema, $data_inicio, $prev_termino)
    {
        $this->situacao = $situacao;
        $this->id_professor = $id_professor;
        $this->id_aluno = $id_aluno;
        $this->tema = $tema;
        $this->data_inicio = $data_inicio;
        $this->prev_termino = $prev_termino;
    }

    function getIdTCC(){
        return $this->id_tcc;
    }

    function setIdTCC($id_tcc){
        $this->id_tcc = $id_tcc;
    }

    function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update tcc set 
            situacao=:situacao, id_professor=:id_professor, data_inicio=:data_inicio, 
            prev_termino=:prev_termino, tema=:tema, id_aluno=:id_aluno 
            where id_tcc=:id_tcc");
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':id_professor',$this->id_professor);
            $stmt->bindParam(':data_inicio',$this->data_inicio);
            $stmt->bindParam(':prev_termino',$this->prev_termino);
            $stmt->bindParam(':tema',$this->tema);
            $stmt->bindParam(':id_aluno',$this->id_aluno);
            
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function excluir_tcc(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("delete from tcc where id_tcc = :id_tcc");
            $stmt->bindParam(':id_tcc',$this->id_tcc);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            
            $stmt = $conn->prepare("insert into tcc
            (id_professor, id_aluno, tema, data_inicio, prev_termino, situacao) 
            values( :id_professor, :id_aluno, :tema, :data_inicio, :prev_termino,:situacao)");
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':id_professor',$this->id_professor);
            $stmt->bindParam(':id_aluno',$this->id_aluno);
            $stmt->bindParam(':tema',$this->tema);
            $stmt->bindParam(':data_inicio',$this->data_inicio);
            $stmt->bindParam(':prev_termino',$this->prev_termino);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_tcc){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from tcc where id_tcc = :id_tcc");
            $stmt->bindParam(':id_tcc',$id_tcc);
            $stmt->execute();
            $tcc = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $tcc = new TCC($value['situacao'],
                $value['id_professor'], $value['id_aluno'],
                $value['tema'], $value['data_inicio'],
                $value['prev_termino']);
                $tcc->setIdTCC( $value['id_tcc']);
             }
            return $tcc;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>