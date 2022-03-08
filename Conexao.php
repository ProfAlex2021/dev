<?php
    class Conexao{
        private $servidor;
        private $banco;
        private $usuario;
        private $senha;

        public function __construct(){
            $this->servidor = "fdb28.awardspace.net";
            $this->banco = $this->usuario = "3593418_wpress562372c0";
            $this->senha = "rGjtqVmWxkzSSYW9oFfsUAGQ6OZcpJ6F";
        }
        
        public function Consultar($sql){
            try{
                $conexao = $this->Conectar();
                $preview = $conexao->query($sql);
                $dados = $preview->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                echo "Erro na consulta: " . $e->getMessage();
                $dados = [];
            } finally{
                return $dados;
            }
        }

        public function Conectar(){
            try{
                $conn = new PDO("mysql:host=$this->servidor;dbname=$this->banco", $this->usuario, $this->senha);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo "Erro ao conectar: " . $e->getMessage();
                $conn = NULL;
            } finally{
                return $conn;
            }
        }
    }