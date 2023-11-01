<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Curso{
    public $id_curso;
    public $descricao;

    function __construct($descricao)
    {
        $this->descricao = $descricao;
    }

    function getIdCurso(){
        return $this->id_curso;
    }

    function setIdCurso($id_curso){
        $this->id_curso = $id_curso;
    }

    function editar(){
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
    }

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into curso 
            (descricao) values (:descricao)");
            $stmt->bindParam(':descricao',$this->descricao);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_curso){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from curso where id_curso = :id_curso");
            $stmt->bindParam(':id_curso',$id_curso);
            $stmt->execute();
            $curso = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $curso = new Curso($value['descricao']);
                $curso->setIdCurso( $value['id_curso']);
             }
            return $curso;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>