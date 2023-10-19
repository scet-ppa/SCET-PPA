<?php
    class Banco{
        private $conn;//representa um canal de comunicação com a base de dados
        private $serverName = "localhost"; //nome do servidor ip
        private $userName = "root"; //nome do usuario
        private $password = ""; 
        private $dbname = "ppa"; //base de dados que será utilizada

        function conectar(){
            try{
                $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbname", $this->userName, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                echo "Conexão realizada";
                return $this->conn; 
            }catch(PDOException $e){
                echo "Erro ao estabelecer conexão: ".$e->getMessage(); 
            }
        }

        function fecharConexao(){
            try{
                $this->conn = null; 
                echo "Conexão finalizada.";
            }catch(PDOException $e){
                echo "Erro ao finalizar conexão.".$e;
            }
        }
    }

    #$bd = new Banco();
    #$bd->conectar();
?>