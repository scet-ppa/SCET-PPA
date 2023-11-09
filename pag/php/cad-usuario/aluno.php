<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Aluno{
    public $id_aluno;
    public $nome;
    public $id_curso;
    public $turma;
    public $matricula;
    public $email;
    public $senha;

    function __construct($nome, $id_curso, $turma, $matricula, $email, $senha){
        $this->nome = $nome;
        $this->turma =  $turma;
        $this->id_curso = $id_curso;
        $this->matricula = $matricula;
        $this->email = $email;
        $this->senha = $senha;
    }

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into aluno (nome, id_curso, turma, matricula, email, senha) values(:nome, :curso, :turma, 
            :matricula, :email, :senha)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':id_curso',$this->id_curso);
            $stmt->bindParam(':turma',$this->turma);
            $stmt->bindParam(':matricula',$this->matricula);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }
    function getIdAluno(){
        return $this->id_aluno;
    }

    /*function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update aluno set nome=:nome, curso=:curso, turma=:turma, matricula=:matricula, email=:email, senha=:senha where id_aluno=:id_aluno");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':curso',$this->curso);
            $stmt->bindParam(':turma',$this->turma);
            $stmt->bindParam(':matricula',$this->matricula);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
          //  $stmt->bindParam(':curso',$this->curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }*/

    function setIdAluno($id_aluno){
        $this->id_aluno = $id_aluno;
    }

    static function getAlunoUsuario($email, $senha){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from aluno where email=:email and senha=:senha");
            $stmt->bindParam(":email", $email); 
            $stmt->bindParam(":senha", $senha); 
            $stmt->execute();
           // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $alunos = null;
            
            foreach($stmt->fetchAll() as $v => $value){
                $aluno = new Aluno($value['nome'], $value['id_curso'], $value['turma'], $value['matricula'], $value['email'],
                $value['senha']);
                $aluno->setIdAluno( $value['id_aluno']);
               
            }

            //var_dump($alunos);
            return $alunos;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }

    
    static function carregar($id_aluno){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from aluno where id_aluno = :id_aluno");
            $stmt->bindParam(':id_aluno',$id_aluno);
            $stmt->execute();
            $aluno = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $aluno = new Aluno($value['nome'], $value['id_curso'], $value['turma'], $value['matricula'], $value['email'],
                $value['senha']);
                $aluno->setIdAluno( $value['id_aluno']);
             }
            return $aluno;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }


}


?>