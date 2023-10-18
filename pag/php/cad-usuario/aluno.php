<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Aluno{
    public $id_aluno;
    public $nome;
    public $curso;
    public $turma;
    public $matricula;
    public $email;
    public $senha;

    function __construct($nome, $curso, $turma, $matricula, $email, $senha){
        $this->nome = $nome;
        $this->turma =  $turma;
        $this->curso = $curso;
        $this->matricula = $matricula;
        $this->email = $email;
        $this->senha = $senha;
    }

    function inserir(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into aluno (nome, curso, turma, matricula, email, senha) values(:nome, :curso, :turma, 
            :matricula, :email, :senha)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':curso',$this->curso);
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

    function setIdAluno($id_aluno){
        $this->id_aluno = $id_aluno;
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
                $aluno = new Aluno($value['nome'],
                $value[''],$value['id_curso'],
                $value['nascimento'],
                $value['sexo']);
                $aluno->setIdAluno( $value['id_aluno']);
             }
            return $aluno;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }
    }


}


?>