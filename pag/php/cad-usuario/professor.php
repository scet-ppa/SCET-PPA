<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Professor{
    public $id_professor;
    public $nome;
    public $matricula;
    public $email;
    public $senha;

    function __construct($nome, $matricula, $email, $senha){
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->email = $email;
        $this->senha = $senha;
    }

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into professor (nome, matricula, email, senha) values(:nome, :matricula, :email, :senha)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':matricula',$this->matricula);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }
    function getIdProfessor(){
        return $this->id_professor;
    }

    function setIdProfessor($id_professor){
        $this->id_professor = $id_professor;
    }

    static function getProfessorUsuario($email, $senha){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from professor where email=:email and senha=:senha");
            $stmt->bindParam(":email", $email); 
            $stmt->bindParam(":senha", $senha); 
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $coord = null;
            
            foreach($stmt->fetchAll() as $v => $value){
                $coord = new Professor($value['nome'], $value['matricula'], $value['email'],  $value['senha'],  $value['matricula']);
                $coord->setIdProfessor( $value['id_professor']);
               
            }

            //var_dump($alunos);
            return $coord;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }

    static function carregar($id_professor){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from professor where id_professor = :id_professor");
            $stmt->bindParam(':id_professor',$id_professor);
            $stmt->execute();
            $professor = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $professor = new Professor($value['nome'], $value['email'],
                $value['matricula'], $value['senha']);
                $professor->setIdProfessor( $value['id_professor']);
             }
            return $professor;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }


}


?>