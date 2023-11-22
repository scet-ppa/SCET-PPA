<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Estagio{
    public $id_estagio;
    public $orientador;
    public $id_aluno;
    public $id_empresa;
    public $data_inicio;
    public $prev_termino;
    public $situacao;

    function __construct($situacao, $orientador, $id_aluno, $id_empresa, $data_inicio, $prev_termino)
    {
        $this->situacao = $situacao;
        $this->id_empresa = $id_empresa;
        $this->orientador = $orientador;
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

    function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update estagio set 
            situacao=:situacao, orientador=:orientador, data_inicio=:data_inicio, prev_termino=:prev_termino, id_empresa=:id_empresa, id_aluno=:id_aluno where id_estagio=:id_estagio");
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':id_estagio',$this->id_estagio);
            $stmt->bindParam(':id_empresa',$this->id_empresa);
            $stmt->bindParam(':id_aluno',$this->id_aluno);
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':data_inicio',$this->data_inicio);
            $stmt->bindParam(':prev_termino',$this->prev_termino);
          //  $stmt->bindParam(':curso',$this->curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function concluir_estagio(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update estagio set 
            situacao=:situacao, orientador=:orientador, data_inicio=:data_inicio, prev_termino=:prev_termino, id_empresa=:id_empresa, id_aluno=:id_aluno where id_estagio=:id_estagio");
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':id_estagio',$this->id_estagio);
            $stmt->bindParam(':id_empresa',$this->id_empresa);
            $stmt->bindParam(':id_aluno',$this->id_aluno);
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':data_inicio',$this->data_inicio);
            $stmt->bindParam(':prev_termino',$this->prev_termino);
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
            $stmt = $conn->prepare("insert into estagio(situacao, orientador, id_aluno, id_empresa, data_inicio, prev_termino) 
            values(:situacao, :orientador, :id_aluno, :id_empresa, :data_inicio, :prev_termino)");
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
                $value['orientador'], $value['id_aluno'],
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