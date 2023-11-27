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
    public $uf;

    function __construct($nome, $cep, $numero, $complemento, $bairro, $municipio, $endereco, $uf){
        $this->nome = $nome;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->municipio = $municipio;
        $this->endereco = $endereco;
        $this->uf = $uf;
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
            nome=:nome, endereco=:endereco, cep=:cep, numero=:numero, complemento=:complemento, bairro=:bairro, municipio=:municipio, endereco=:endereco, uf=:uf  where id_empresa=:id_empresa");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':endereco',$this->endereco);
            $stmt->bindParam(':complemento',$this->complemento);
            $stmt->bindParam(':bairrp',$this->bairro);
            $stmt->bindParam(':cep',$this->cep);
            $stmt->bindParam(':numero',$this->numero);
            $stmt->bindParam(':municipio',$this->municipio);
            $stmt->bindParam(':uf',$this->uf);
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
            //$nome, $cep, $numero, $complemento, $bairro, $municipio, $endereco
            $stmt = $conn->prepare("insert into empresa 
            (nome, cep, numero, complemento, bairro,  municipio, endereco, uf) values (:nome, :cep, :numero, :complemento, :bairro, :municipio, :endereco, :uf)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':cep',$this->cep);
            $stmt->bindParam(':numero',$this->numero);
            $stmt->bindParam(':complemento',$this->complemento);
            $stmt->bindParam(':bairro',$this->bairro);
            $stmt->bindParam(':municipio',$this->municipio);
            $stmt->bindParam(':endereco',$this->endereco);
            $stmt->bindParam(':uf',$this->uf);
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
                $empresa = new Empresa($value['nome'], $value['complemento'], $value['numero'], $value['cep'], $value['bairro'], $value['endereco'], $value['municipio'], $value['uf']);
                $empresa->setIdEmpresa( $value['id_empresa']);
             }
            return $empresa;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>