<?php
include_once 'pendente.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';

class Pendente{
    public $id_tcc;
    public $id_aluno;
    public $orientador;
    public $id_professor;
    public $situacao;
    public $tema;
    public $relatorio;
    public $data_inicio;
    public $prev_termino;

function __construct($id_aluno, $orientador, $id_professor, $situacao, $tema, $relatorio) {
    $this->id_aluno = $id_aluno;
    $this->orientador = $orientador;
    $this->id_professor = $id_professor;
    $this->situacao = $situacao;
    $this->tema = $tema;
    $this->relatorio = $relatorio;
}

function getIdPendente() {
    return $this->id_pendente;
}

function setIdPendente($id_pendente) {
    $this->id_pendente = $id_pendente;
}

function editar() {
    $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update pendente set orientador=:orientador, situacao=:situacao, tema:=tema, relatorio:=relatorio where id_tcc=:id_tcc");
            $stmt->bindParam(':orientador',$this->orientador);
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':tema',$this->tema);
            $stmt->bindParam(':relatorio',$this->relatorio);
            $stmt->bindParam(':id_pendente',$this->id_pendente);
            // $stmt->bindParam(':curso',$this->curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

        function excluir_pendente() {
            $banco = new Banco();
            $conn = $banco->conectar();
            try{
                $stmt = $conn->prepare("delete from pendente where id_pendente = :id_pendente");
                $stmt->bindParam(':id_pendente',$this->id_pendente);
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            $banco->fecharConexao();
        }

        function inserir() {
        $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("insert into pendente (tema) values (:tema)");
            $stmt->bindParam(':tema',$this->tema);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
        }

        static function carregar($id_pendente) {
            try{
                $banco = new Banco();
                $conn = $banco->conectar();
                $stmt = $conn->prepare("select * from pendente where id_pendente = :id_pendente");
                $stmt->bindParam(':id_pendente',$id_pendente);
                $stmt->execute();
                $tcc = null;
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach($stmt->fetchAll() as $v => $value){
                    $tcc = new Pendente($value['tema']);
                    $tcc->setIdPendente( $value['id_pendente']);
                 }
                return $id_pendente;
    
            }catch(PDOException $e){
                echo "Erro " . $e->getMessage();
            }
        }
}

?>