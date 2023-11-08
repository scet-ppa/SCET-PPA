<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Coordenador{
    public $id_coordenador;
    public $nome;
    public $email;
    public $senha;

    function __construct($nome, $email, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into coordenador (nome, email, senha) values(:nome, :email, :senha)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function getIdCoordenador(){
        return $this->id_coordenador;
    }

    function setIdCoordenador($id_coordenador){
        $this->id_coordenador = $id_coordenador;
    }

    static function getCoordenadorUsuario($email, $senha){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from coordenador where email=:email and senha=:senha");
            $stmt->bindParam(":email", $email); 
            $stmt->bindParam(":senha", $senha); 
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $coord = null;
            
            foreach($stmt->fetchAll() as $v => $value){
                $coord = new Coordenador($value['nome'], $value['email'], $value['email'],
                $value['senha']);
                $coord->setIdCoordenador( $value['id_coordenador']);
               
            }

            //var_dump($alunos);
            return $coord;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }

    static function carregar($id_coordenador){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from coordenador where id_coordenador = :id_coordenador");
            $stmt->bindParam(':id_coordenador',$id_coordenador);
            $stmt->execute();
            $coordenador = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $coordenador = new coordenador($value['nome'],
                $value['email'],
                $value['senha']);
                $coordenador->setIdcoordenador( $value['id_coordenador']);
             }
            return $coordenador;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }
}
?>