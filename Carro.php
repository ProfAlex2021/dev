<?php
include "Conexao.php";
    class Carro{
        private int $id;
        private string $placa;
        private int $ano;
        private bool $ipvaPago;
        private string $ipvaData;
        private float $ipvaValor;

        public function __construct(string $placa, int $ano, bool $ipvaPago, string $ipvaData, float $ipvaValor){
            $this->placa = $placa;
            $this->ano = $ano;
            $this->ipvaPago = $ipvaPago;
            $this->ipvaData = $ipvaData;
            $this->ipvaValor = $ipvaValor;
        }
        public function Cadastrar(){
            $conexao = new Conexao();
            $sql = "INSERT INTO
            Carro(placa, ano, ipvaPago, ipvaData, ipvaValor)
            VALUES (:placa, :ano, :ipvaPago, :ipvaData, :ipvaValor)";
            $pdo = $conexao->Conectar();
            $preparo = $pdo->prepare($sql);
            $preparo->bindParam(':ano', $this->ano);
            $preparo->bindParam(':placa', $this->placa);
            $preparo->bindParam(':ipvaData', $this->ipvaData);
            $preparo->bindParam(':ipvaPago', $this->ipvaPago);
            $preparo->bindParam(':ipvaValor', $this->ipvaValor);
            $preparo->execute();
        }

        public static function ListarTodos(){
            $conexao = new Conexao();
            $sql = "SELECT * FROM Carro";
            $dados = $conexao->Consultar($sql);
            return $dados;
        }
    }