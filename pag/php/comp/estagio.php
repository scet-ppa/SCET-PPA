<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Estagio{
    public $id_estagio;
    public $id_professor;
    public $id_aluno;
    public $id_empresa;
    public $data_inicio;
    public $prev_termino;
    public $situacao;

    function __construct($situacao, $id_professor, $id_aluno, $id_empresa, $data_inicio, $prev_termino)
    {
        $this->situacao = $situacao;
        $this->id_empresa = $id_empresa;
        $this->id_professor= $id_professor;
        $this->id_aluno = $id_aluno;
        $this->data_inicio = $data_inicio;
        $this->prev_termino = $prev_termino;
    }

    function getIdEstagio(){
        return $this->id_estagio;
    }

    function setIdEstagio($id_estagio){
        $this->id_estagio = $id_estagio;
    }

    /*function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update curso set 
            descricao=:descricao where id_curso=:id_curso");
            $stmt->bindParam(':descricao',$this->descricao);
            $stmt->bindParam(':id_curso',$this->id_curso);
          //  $stmt->bindParam(':curso',$this->curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function excluir_curso(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("delete from curso where id_curso = :id_curso");
            $stmt->bindParam(':id_curso',$this->id_curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }*/

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into estagio(situacao, id_professor, id_aluno, id_empresa, data_inicio, prev_termino) 
            values(:situacao, :id_professor, :id_aluno, :id_empresa, :data_inicio, :prev_termino)");
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':id_professor',$this->id_professor);
            $stmt->bindParam(':id_empresa',$this->id_empresa);
            $stmt->bindParam(':data_inicio',$this->data_inicio);
            $stmt->bindParam(':prev_termino',$this->prev_termino);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_estagio){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from estagio where id_estagio = :id_estagio");
            $stmt->bindParam(':id_estagio',$id_estagio);
            $stmt->execute();
            $estagio = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $estagio = new Estagio($value['situacao'],
                $value['id_professor'], $value['id_aluno'],
                $value['id_empresa'], $value['data_inicio'],
                $value['prev_termino']);
                $estagio->setIdCurso( $value['id_estagio']);
             }
            return $estagio;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>