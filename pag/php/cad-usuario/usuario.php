<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Usuario{
    public $id_usuario;
    public $descricao;

    function __construct($descricao)
    {
        $this->descricao = $descricao;
    }

    function getIdUsuario(){
        return $this->id_usuario;
    }

    function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    function excluir_usuario(){
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("delete from usuario where id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario',$this->id_usuario);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

    static function carregar($id_usuario){
        try{
            $banco = new Banco();
            $conn = $banco->conectar();
            $stmt = $conn->prepare("select * from usuario where id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->execute();
            $usuario = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $v => $value){
                $usuario = new Usuario($value['descricao']);
                $usuario->setIdUsuario( $value['id_usuario']);
             }
            return $usuario;

        }catch(PDOException $e){
            echo "Erro " . $e->getMessage();
        }

    }
}
?>