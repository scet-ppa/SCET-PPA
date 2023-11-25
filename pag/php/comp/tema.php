<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Tema{
    public $id_tema;
    public $nome;

    function __construct($nome)
    {
        $this->nome = $nome;
    }

    function getIdTema(){
        return $this->id_tema;
    }

    function setIdTema($id_tema){
        $this->id_tema = $id_tema;
    }

    function editar(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update tema set nome=:nome where id_tema=:id_tema");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->bindParam(':id_tema',$this->id_tema);
          //  $stmt->bindParam(':tema',$this->tema);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    function excluir_tema(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("delete from tema where id_tema = :id_tema");
            $stmt->bindParam(':id_tema',$this->id_tema);
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
            $stmt = $conn->prepare("insert into tema (nome) values (:nome)");
            $stmt->bindParam(':nome',$this->nome);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_tema){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from tema where id_tema = :id_tema");
            $stmt->bindParam(':id_tema',$id_tema);
            $stmt->execute();
            $tema = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $tema = new Tema($value['nome']);
                $tema->setIdTema( $value['id_tema']);
             }
            return $tema;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>