<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/banco.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/cad-usuario/professorHelper.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/SCET-PPA/pag/php/cad-usuario/alunoHelper.php';

class TCC{
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

function getIdTCC() {
    return $this->id_tcc;
}

function setIdTCC($id_tcc) {
    $this->id_tcc = $id_tcc;
}

function editar() {
    $banco = new Banco();
        $conn = $banco->conectar();
        try{
            $stmt = $conn->prepare("update tcc set orientador=:orientador, situacao=:situacao, tema:=tema, relatorio:=relatorio where id_tcc=:id_tcc");
            $stmt->bindParam(':orientador',$this->orientador);
            $stmt->bindParam(':id_tcc',$this->id_tcc);
            $stmt->bindParam(':situacao',$this->situacao);
            $stmt->bindParam(':tema',$this->tema);
            $stmt->bindParam(':relatorio',$this->relatorio);
            $stmt->bindParam(':data_inicio',$this->data_inicio);
            $stmt->bindParam(':prev_termino',$this->prev_termino);
            // $stmt->bindParam(':curso',$this->curso);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
    }

        function concluir_tcc() {
            $banco = new Banco();
            $conn = $banco->conectar();
            try{
                $stmt = $conn->prepare("delete set orientador=:orientador, situacao=:situacao, tema:=tema, relatorio:=relatorio tcc where id_tcc=:id_tcc");
                $stmt->bindParam(':id_tcc',$this->id_tcc);
                $stmt->bindParam(':orientador',$this->orientador);
                $stmt->bindParam(':situacao',$this->situacao);
                $stmt->bindParam(':tema',$this->tema);
                $stmt->bindParam(':relatorio',$this->relatorio);
                $stmt->bindParam(':data_inicio',$this->data_inicio);
                $stmt->bindParam(':prev_termino',$this->prev_termino);
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
            $stmt = $conn->prepare("insert into tcc(orientador, ) values (:tema)");
            $stmt->bindParam(':tema',$this->tema);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $banco->fecharConexao();
        }

        static function carregar($id_tcc) {
            try{
                $banco = new Banco();
                $conn = $banco->conectar();
                $stmt = $conn->prepare("select * from tcc where tcc = :id_tcc");
                $stmt->bindParam(':id_tcc',$id_tcc);
                $stmt->execute();
                $tcc = null;
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach($stmt->fetchAll() as $v => $value){
                    $tcc = new TCC($value['situacao'],
                    $value['orientador'], $value['id_aluno'],
                    $value['tema'], $value['data_inicio'],
                    $value['prev_termino']);
                    $tcc->setIdTCC( $value['id_tcc']);
                 }
                return $tcc;
    
            }catch(PDOException $e){
                echo "Erro " . $e->getMessage();
            }
        }
}

?>