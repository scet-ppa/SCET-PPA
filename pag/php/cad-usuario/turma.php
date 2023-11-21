<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Turma{
    public $id_turma;
    public $id_curso;
    public $descricao;
    public $letivo;

    function __construct($descricao, $letivo){
        $this->descricao = $descricao;
        $this->letivo = $letivo; 
    }

    function getIdTurma(){
        return $this->id_turma;
    }

    function setIdTurma($id_turma){
        $this->id_turma = $id_turma;
    }

    function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update turma set 
            descricao=:descricao where id_turma=:id_turma");
            $stmt->bindParam(':descricao',$this->descricao);
            $stmt->bindParam(':id_turma',$this->id_turma);
          //  $stmt->bindParam(':curso',$this->curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function excluir_turma(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("delete from turma where id_turma = :id_turma");
            $stmt->bindParam(':id_turma',$this->id_turma);
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
            $stmt = $conn->prepare("insert into turma 
            (descricao, letivo) values (:descricao, :letivo)");
            $stmt->bindParam(':descricao',$this->descricao);
            $stmt->bindParam(':letivo',$this->letivo);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_turma){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from turma where id_turma = :id_turma");
            $stmt->bindParam(':id_turma', $id_turma);
            $stmt->execute();
            $turma = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $turma = new Turma($value['descricao'], $value['letivo']);
                $turma->setIdTurma( $value['id_turma']);
             }
            return $turma;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>