<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Empresa{
    public $id_empresa;
    public $nome;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    function getIdEmpresa(){
        return $this->id_empresa;
    }

    function setIdEmpresa($id_empresa){
        $this->id_empresa = $id_empresa;
    }

    function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update empresa set 
            nome=:nome where id_empresa=:id_empresa");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':id_empresa',$this->id_empresa);
          //  $stmt->bindParam(':empresa',$this->empresa);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function excluir_empresa(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("delete from empresa where id_empresa = :id_empresa");
            $stmt->bindParam(':id_empresa',$this->id_empresa);
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
            $stmt = $conn->prepare("insert into empresa 
            (nome) values (:nome)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_empresa){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from empresa where id_empresa = :id_empresa");
            $stmt->bindParam(':id_empresa',$id_empresa);
            $stmt->execute();
            $empresa = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $empresa = new Empresa($value['nome']);
                $empresa->setIdEmpresa( $value['id_empresa']);
             }
            return $empresa;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>