<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Empresa{
    public $id_empresa;
    public $nome;
    public $cep;
    public $numero;
    public $complemento;
    public $bairro;
    public $municipio;
    public $endereco;

    function __construct($nome, $cep, $numero, $complemento, $bairro, $municipio, $endereco)
    {
        $this->nome = $nome;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->municipio = $municipio;
        $this->endereco = $endereco;
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
            nome=:nome, endereco=:endereco, cep=:cep, numero=:numero, complemento=:complemento, bairro=:bairro, municipio=:municipio, endereco=:endereco  where id_empresa=:id_empresa");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':endereco',$this->endereco);
            $stmt->bindParam(':nome',$this->complemento);
            $stmt->bindParam(':nome',$this->bairro);
            $stmt->bindParam(':nome',$this->cep);
            $stmt->bindParam(':nome',$this->numero);
            $stmt->bindParam(':municipio',$this->municipio);
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
            (nome, complemento, numero, cep, bairro, endereco, municipio) values (:nome, :complemento, :numero, :cep, :bairro, :endereco, :municipio)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':complemento',$this->complemento);
            $stmt->bindParam(':numero',$this->numero);
            $stmt->bindParam(':cep',$this->cep);
            $stmt->bindParam(':bairro',$this->bairro);
            $stmt->bindParam(':endereco',$this->endereco);
            $stmt->bindParam(':municipio',$this->municipio);
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
                $empresa = new Empresa($value['nome'], $value['complemento'], $value['numero'], $value['cep'], $value['bairro'], $value['endereco'], $value['municipio']);
                $empresa->setIdEmpresa( $value['id_empresa']);
             }
            return $empresa;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>